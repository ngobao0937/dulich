<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Menu;
use App\Models\ProductMenu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;
use App\Models\Banner;
use App\Models\Other;
use App\Models\Extension;
use App\Models\Promotion;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::user()->role->id == 2){
            return redirect()->route('backend.product.my.product');
        }

        $query = Product::query();

        if (!Auth::user()->isSuperUser()) {
            $productIds = Auth::user()->products()->pluck('product_fk');
            $query->whereIn('id', $productIds);
        }

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('address', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('hotline', 'like', '%' . $search . '%')
                    ->orWhere('phone', 'like', '%' . $search . '%')
                    ->orWhere('website', 'like', '%' . $search . '%')
                    ->orWhere('location', 'like', '%' . $search . '%')
                    ->orWhere('content', 'like', '%' . $search . '%');
            });
        }

        if($request->active != 'all' && ($request->active == '0' || $request->active == '1') && $request->has('active')){
            $query->where('active', $request->active);
        }

        $products = $query->where('isdelete', 0)->orderby('id', 'desc')->paginate(20);

        return view('backend.product.index', compact('products'));
    }
	public function create(Request $request) {
        if($request->product_fk){
            $product = Product::find($request->product_fk);
        }else{
            $product = Product::create(['isdelete' => 1]);
        }
		return view('backend.product.model', ['product' => $product]);
    }

	public function edit(Request $request) {
		$id = $request->input('id');

		$product = Product::with(['image', 'user'])->find($id);
        // Promotion::where('product_fk', $product->id)->where('issave', 0)->delete();
		return view('backend.product.model', [
			'product' => $product,
		]);
    }
    public function myProduct() {
        if(Auth::user()->role->id != 2){
            abort(403, 'Bạn không có quyền truy cập vào chức năng này.');
        }
        $chatbotKS = Other::find(17);
		$id = Auth::user()->product ? Auth::user()->product->id : null;
        if($id == null){
            return view('backend.product.empty', ['chatbotKS' => $chatbotKS]);
        }
		$product = Product::with(['image', 'user'])->find($id);
        
		return view('backend.product.model', [
			'product' => $product,
            'chatbotKS' => $chatbotKS
		]);
    }
	public function store(Request $request) {
		
		$validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

		if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

		$id = $request->input('id', null);  

		$data = [
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
            'hotline' => $request->input('hotline'),
            'facebook' => $request->input('facebook'),
            'instagram' => $request->input('instagram'),
            'twitter' => $request->input('twitter'),
            'youtube' => $request->input('youtube'),
            'tiktok' => $request->input('tiktok'),
            'link360' => $request->input('link360'),
            'chatbot' => $request->input('chatbot'),
            'map' => $request->input('map'),
            'location' => $request->input('location'),
            'content' => $request->input('content'),
            'active' => $request->active ? 1 : 0,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'isdelete' => 0
        ];

        if (Auth::user()->isSuperuser() && $request->has('user_fk')) {
            $newUserId = $request->user_fk;

            if ($newUserId != 10000) {
                $editingProductId = $request->input('id', null);

                Product::where('user_fk', $newUserId)
                    ->when($editingProductId, function ($q) use ($editingProductId) {
                        return $q->where('id', '<>', $editingProductId);
                    })
                    ->update(['user_fk' => 10000]);
            }

            $data['user_fk'] = $newUserId;
        }

		$obj = Product::updateOrCreate(
			['id' => $id],
			$data
		);

        ProductMenu::where('product_fk', $obj->id)->delete();

        $menus_fk = $request->input('menus_fk', []); 

        foreach ($menus_fk as $menuId) {
            ProductMenu::create([
                'product_fk' => $obj->id,
                'menu_fk' => $menuId
            ]);
        }

		if($request->hasfile('picture')){
			SaveImage($request, $obj->id, 'product_hinh_dai_dien');
		}

        if ($request->filled('uploaded_pictures_banner')) {
            $pictures = json_decode($request->input('uploaded_pictures_banner'), true);
            foreach ($pictures as $fileName) {
                Image::updateOrCreate(
                    ['id' => null],
                    [
                        'ten' => $fileName,
                        'id_fk' => $obj->id,
                        'type' => 'product_banner'
                    ]
                );
            }
        }

        if ($request->filled('uploaded_pictures')) {
            $pictures = json_decode($request->input('uploaded_pictures'), true);
            foreach ($pictures as $fileName) {
                Image::updateOrCreate(
                    ['id' => null],
                    [
                        'ten' => $fileName,
                        'id_fk' => $obj->id,
                        'type' => 'product_hinh_khac'
                    ]
                );
            }
        }



        // Promotion::where('product_fk', $id)
        //         ->where('issave', 0)
        //         ->update(['issave' => 1]);
        
        if(Auth::user()->role->id == 2){
            return redirect()->route('backend.product.my.product');
        }else{
            return redirect(route('backend.product.index', $request->query()));
        }
		
    }

	public function delete(Request $request) {
		$id = $request->input('id');
		$product = Product::find($id);
		$product->isdelete = 1;
        $product->save();
       return redirect(route('backend.product.index', $request->query()));
    }

    public function deleteImg(Request $request)
    {
        $img = Image::find($request->input('id'));
        
        if (!empty($img)) {
            $img->isdelete = 1;
            $img->save();
            return response()->json(['success' => true, 'imageId' => $img->id]);
        }else{
            return response()->json(['success' => false, 'message' => 'Hình ảnh không tồn tại.'], 404);
        }
    }

    public function detail(Request $request){
        $product = Product::where('isdelete', 0)->where('active', 1)->where('id',$request->id)->first();
        $meta_keywords = $product->meta_keywords ? $product->name . ', ' .$product->meta_keywords : $product->name;
        return view('frontend.product.detail', [
            'product' => $product,
            'meta_title' => $product->name,
            'meta_description' => $product->meta_description ?? 'Trang thông tin du lịch Bà Rịa Vũng Tàu Tourism.',
            'meta_keywords' => $meta_keywords,
            'meta_og_image' => $product->image ? asset('uploads/'.$product->image->ten) : asset('images/default.jpg'),
            'meta_og_url' => route('frontend.product.detail',['id'=>$request->id, 'slug'=>$request->slug]),
            'meta_og_type' => 'product'
        ]);

        // return view('frontend.home.chitiet', ['product' => $product]);
    }

    public function search(Request $request){
        $query = Product::query();
    
        if ($request->search_query) {
            $query->where('name', 'like', '%'. $request->search_query .'%');
        }
    
        // Xử lý sắp xếp theo lọc
        switch ($request->sort_by) {
            case 'sales':
                $query->orderBy('sold', 'desc');
                break;
            case 'new':
                $query->orderBy('created_at', 'desc');
                break;
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            default:
                // Mặc định không thay đổi
                break;
        }

        if($request->has('thuonghieu')){
            $query->whereIn('brand_fk', $request->thuonghieu);
        }

        $products = $query->paginate(25);

        $brands = Product::where('name', 'like', '%'. $request->search_query .'%')
                        ->with('brand')
                        ->get()
                        ->pluck('brand')
                        ->unique('id')
                        ->filter()
                        ->values();
    
        return view('frontend.product.search', [
            'products' => $products,
            'activeSort' => $request->sort_by ?? 'default',
            'searchQuery' => $request->search_query ?? '',
            'brands' => $brands
        ]);
    }
    

    public function menu(Request $request){
        $menu = Menu::find($request->id);

        $menuIds = [$menu->id];

        if ($menu->menu_fk && $menu->menu_fk != 0) {
            $parent1 = Menu::find($menu->menu_fk);
            if ($parent1) {
                $menuIds[] = $parent1->id;

                if ($parent1->menu_fk && $parent1->menu_fk != 0) {
                    $parent2 = Menu::find($parent1->menu_fk);
                    if ($parent2) {
                        $menuIds[] = $parent2->id;
                    }
                }
            }
        }

        $products = Product::whereIn('menu_fk', $menuIds);

        switch ($request->sort_by) {
            case 'sales':
                $products ->orderBy('sold', 'desc');
                break;
            case 'new':
                $products ->orderBy('created_at', 'desc');
                break;
            case 'price_asc':
                $products ->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $products ->orderBy('price', 'desc');
                break;
            default:
                // Mặc định không thay đổi
                break;
        }

        if($request->has('thuonghieu')){
            $products->whereIn('brand_fk', $request->thuonghieu);
        }

        $products = $products->paginate(25);


        $brands = Product::whereIn('menu_fk', $menuIds)
                        ->with('brand')
                        ->get()
                        ->pluck('brand')
                        ->unique('id')
                        ->filter()
                        ->values();

        $vouchers = getVouchers();
        $blogs = Blog::take(10)->get();
        $banners = Banner::where('active', 1)->where('vi_tri', 'home')->orderby('position', 'asc')->get();

        return view('frontend.product.menu', [
            'products' => $products,
            'menu' => $menu,
            'vouchers' => $vouchers,
            'blogs' => $blogs,
            'banners' => $banners,
            'brands' => $brands,
            'activeSort' => $request->sort_by ?? 'default',
        ]);
    }

    // public function promotions(Request $request)
    // {
    //     $banners = Banner::where('type', 'promotion')
    //         ->orderBy('position', 'asc')
    //         ->where('active', 1)
    //         ->get();
            
    //     $desktopBanners = Banner::where('type', 'promotion')
    //         ->where('active', 1)
    //         ->where('isMobile', 0)
    //         ->orderBy('position', 'asc')
    //         ->get();

    //     $mobileBanners = Banner::where('type', 'promotion')
    //         ->where('active', 1)
    //         ->where('isMobile', 1)
    //         ->orderBy('position', 'asc')
    //         ->get();

    //     $menuIds = $request->input('filters', []);
    //     $keyword = $request->input('keyword');

    //     $products = Product::where('active', 1)
    //         ->where('isdelete', 0)
    //         ->when(!empty($menuIds), function ($query) use ($menuIds) {
    //             $query->whereHas('menus', function ($q) use ($menuIds) {
    //                 $q->whereIn('menus.id', $menuIds);
    //             });
    //         })
    //         ->when(!empty($keyword), function ($query) use ($keyword) {
    //             $query->where(function ($q) use ($keyword) {
    //                 $q->where('products.name', 'like', "%$keyword%")
    //                 ->orWhereHas('promotionThuongMain', function ($sub) use ($keyword) {
    //                     $sub->where('name', 'like', "%$keyword%");
    //                 });
    //             });
    //         })
    //         ->whereHas('promotionThuongMain')
    //         ->orderBy('id', 'desc')
    //         ->paginate(12);

    //     return view('frontend.product.promotions', [
    //         'banners' => $banners,
    //         'products' => $products,
    //         'desktopBanners' => $desktopBanners,
    //         'mobileBanners' => $mobileBanners,
    //     ]);
    // }

    public function promotions(Request $request)
    {
        $banners = Banner::where('type', 'promotion')
            ->where('active', 1)
            ->orderBy('position', 'asc')
            ->get();

        $desktopBanners = $banners->where('isMobile', 0);
        $mobileBanners = $banners->where('isMobile', 1);

        $products = $this->getPromotionalProducts($request);

        return view('frontend.product.promotions', [
            'banners' => $banners,
            'products' => $products,
            'desktopBanners' => $desktopBanners,
            'mobileBanners' => $mobileBanners,
        ]);
    }


    public function getPromotionalProducts(Request $request)
    {
        $menuIds = $request->input('filters', []);
        $keyword = $request->input('keyword');

        return Product::where('active', 1)
            ->where('isdelete', 0)
            ->with('promotionThuongMain.image')
            ->when(!empty($menuIds), function ($query) use ($menuIds) {
                $query->whereHas('menus', function ($q) use ($menuIds) {
                    $q->whereIn('menus.id', $menuIds);
                });
            })
            ->when(!empty($keyword), function ($query) use ($keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('products.name', 'like', "%$keyword%")
                        ->orWhereHas('promotionThuongMain', function ($sub) use ($keyword) {
                            $sub->where('name', 'like', "%$keyword%");
                        });
                });
            })
            ->whereHas('promotionThuongMain')
            ->orderBy('id', 'desc')
            ->paginate(12);
    }

    public function apiPromotions(Request $request)
    {
        $products = $this->getPromotionalProducts($request);

        return response()->json([
            'products' => $products
        ]);
    }


    public function ajaxPromotions(Request $request)
    {
        $menuIds = $request->input('filters', []);
        $keyword = $request->input('keyword');

        $products = Product::where('active', 1)
            ->where('isdelete', 0)
            ->when(!empty($menuIds), function ($query) use ($menuIds) {
                $query->whereHas('menus', function ($q) use ($menuIds) {
                    $q->whereIn('menus.id', $menuIds);
                });
            })
            ->when(!empty($keyword), function ($query) use ($keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('products.name', 'like', "%$keyword%")
                        ->orWhereHas('promotionThuongMain', function ($sub) use ($keyword) {
                            $sub->where('name', 'like', "%$keyword%");
                        });
                });
            })
            ->whereHas('promotionThuongMain')
            ->orderBy('id', 'desc')
            ->paginate(1);

        $html = view('frontend.product._list', compact('products'))->render();
        return response()->json(['html' => $html]);
    }



    public function getProducts(Request $request)
    {
        $query = $request->input('q');
        $page = $request->input('page', 1);
        $limit = 30;
        $offset = ($page - 1) * $limit;

        $products = Product::when($query, function ($q) use ($query) {
                return $q->where('name', 'like', '%' . $query . '%');
            })
            ->where('isdelete', 0)
            ->orderBy('name')
            ->offset($offset)
            ->limit($limit + 1)
            ->get();

        $hasMorePages = $products->count() > $limit;

        $results = $products->take($limit)->map(function ($product) {
            return [
                'id' => $product->id,
                'text' => $product->name
            ];
        });

        return response()->json([
            'results' => $results,
            'pagination' => ['more' => $hasMorePages]
        ]);
    }

}
