<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Menu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;
use App\Models\Banner;
use App\Models\Document;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });
        }

        $products = $query->where('isdelete', 0)->orderby('id', 'desc')->paginate(20);

        return view('backend.product.index', compact('products'));
    }
	public function create(Request $request) {
		return view('backend.product.model');
    }

	public function edit(Request $request) {
		$id = $request->input('id');
		$product = Product::with(['image'])->find($id);
		return view('backend.product.model', [
			'product' => $product,
		]);
    }
	public function store(Request $request) {
		
		$validator = Validator::make($request->all(), [
            'name' => 'required',
			'menu_fk' => 'required',
            'model' => 'required',
            'document.*' => 'file|mimes:pdf|max:2048',
        ]);

		if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

		$id = $request->input('id', null);  

		$data = [
			'name' => $request->input('name'),
			'slug' => Str::slug($request->input('name')),
			'short_description' => $request->short_description,
            'long_description' => $request->long_description,
			'active' => $request->active ? 1 : 0,
			'menu_fk' => $request->menu_fk,
			'model' => $request->model,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description
		];

		$obj = Product::updateOrCreate(
			['id' => $id],
			$data
		);


		if($request->hasfile('picture')){
			SaveImage($request, $obj->id, 'product_hinh_dai_dien');
		}

        if ($request->hasFile('document')) {
            foreach ($request->file('document') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        
                $file->move(public_path('uploads/documents'), $filename);
        
                Document::updateOrCreate(
                    [
                        'product_fk' => $obj->id,
                        'name' => $filename,
                    ]
                );
            }
        }
        

		return redirect(route('backend.product.index', $request->query()));
    }

	public function delete(Request $request) {
		$id = $request->input('id');
		$product = Product::find($id);
		$product->isdelete = 1;
        $product->save();
       return redirect(route('backend.product.index', $request->query()));
    }

    public function deletePDF(Request $request)
    {
        $pdf = Document::find($request->input('id'));
        
        if (!empty($pdf)) {
            $pdf->isdelete = 1;
            $pdf->save();
            return response()->json(['success' => true, 'documentId' => $pdf->id]);
        }else{
            return response()->json(['success' => false, 'message' => 'File không tồn tại.'], 404);
        }
    }

    public function detail(Request $request){
        $product = Product::where('isdelete', 0)->where('id',$request->id)->first();
        $description = $product->description;
        // $products = Product::where('menu_fk', $product->menu_fk)->where('id', '!=', $product->id)->get();
        $products = Product::all();
        $blogs = Blog::where('active', 1)->orderBy('id','desc')->take(3)->get();
        $comments = Comment::where('product_fk', $request->id)->where('comment_fk', 0)->orderBy('id','desc')->get();

        $vouchers = getVouchers();

        $meta_keywords = $product->meta_keywords ? $product->name . ', ' .$product->meta_keywords : $product->name;
        return view('frontend.product.detail', [
            'product' => $product,
            'products' => $products,
            'blogs' => $blogs,
            'comments' => $comments,
            'vouchers' => $vouchers,
            'description' => $description,
            'meta_title' => $product->name,
            'meta_description' => $product->meta_description ?? 'Chuyên cung cấp đồ dùng mẹ và bé, tã, sữa, quần áo trẻ em chính hãng với giá tốt nhất.',
            'meta_keywords' => $meta_keywords,
            'meta_og_image' => $product->image ? asset('uploads/'.$product->image->ten) : asset('images/default.jpg'),
            'meta_og_url' => route('frontend.product.detail',['id'=>$request->id, 'slug'=>$request->slug]),
            'meta_og_type' => 'product'
        ]);
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

}
