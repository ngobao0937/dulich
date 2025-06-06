<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Page;
use App\Models\Product;
use App\Models\PromotionPublic;
use App\Models\Menu;
use App\Models\Contact;
use App\Models\Sponsor;
use App\Models\Event;
use Mews\Captcha\Facades\Captcha;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(){
        // $products_KS = Product::where('active', 1)
        //     ->where('isdelete', 0)
        //     ->whereHas('menus', function ($query) {
        //         $query->where('menus.id', 10000);
        //     })
        //     ->whereHas('promotionThuongMain')
        //     ->orderBy('id', 'desc')
        //     ->take(5)
        //     ->get();

        // $products_NH = Product::where('active', 1)
        //     ->where('isdelete', 0)
        //     ->whereHas('menus', function ($query) {
        //         $query->where('menus.id', 10001);
        //     })
        //     ->whereHas('promotionThuongMain')
        //     ->orderBy('id', 'desc')
        //     ->take(5)
        //     ->get();

        // $products_KVC = Product::where('active', 1)
        //     ->where('isdelete', 0)
        //     ->whereHas('menus', function ($query) {
        //         $query->where('menus.id', 10002);
        //     })
        //     ->whereHas('promotionThuongMain')
        //     ->orderBy('id', 'desc')
        //     ->take(5)
        //     ->get();

        $promotionPublics = PromotionPublic::with(['promotion.product'])
                ->where('position', '>', 0)
                ->whereHas('promotion.product', function ($query) {
                    $query->where('active', 1)
                        ->where('isdelete', 0);
                })
                ->whereIn('menu_fk', [10000, 10001, 10002])
                ->orderBy('menu_fk')
                ->orderBy('position')
                ->get()
                ->groupBy('menu_fk');

        $promotions_KS = $promotionPublics[10000] ?? collect();
        $promotions_NH = $promotionPublics[10001] ?? collect();
        $promotions_KVC = $promotionPublics[10002] ?? collect();

        $banners = Banner::where('type', 'main')->orderby('position', 'asc')->where('active', 1)->get();

        $desktopBanners = Banner::where('type', 'main')
            ->where('active', 1)
            ->where('isMobile', 0)
            ->orderBy('position', 'asc')
            ->get();

        $mobileBanners = Banner::where('type', 'main')
            ->where('active', 1)
            ->where('isMobile', 1)
            ->orderBy('position', 'asc')
            ->get();

        $blogs = Blog::where('active', 1)->orderby('id', 'desc')->take(6)->get();

        $sponsors = Sponsor::where('active', 1)->orderby('position', 'asc')->get();

        return view('frontend.home.index', [
            'banners' => $banners,
            'desktopBanners' => $desktopBanners,
            'mobileBanners' => $mobileBanners,
            'blogs' => $blogs,
            'promotions_KS' => $promotions_KS,
            'promotions_NH' => $promotions_NH,
            'promotions_KVC' => $promotions_KVC,
            'sponsors' => $sponsors,
            // 'products_KS' => $products_KS,
            // 'products_NH' => $products_NH,
            // 'products_KVC' => $products_KVC
        ]);
    }

    public function event(Request $request){
        $query = Event::query();
        $types = $request->input('loai', ['now', 'coming']);

        $now = Carbon::now();

        $query->where(function ($q) use ($types, $now) {
            foreach ($types as $type) {
                if ($type === 'coming') {
                    $q->orWhere('date_start', '>', $now);
                }

                if ($type === 'now') {
                    $q->orWhere(function ($q2) use ($now) {
                        $q2->where('date_start', '<=', $now)
                            ->where('date_end', '>=', $now);
                    });
                }

                if ($type === 'end') {
                    $q->orWhere('date_end', '<', $now);
                }
            }
        });

        $events = $query->where('active', 1)->orderby('id', 'desc')->paginate(10);

        $banners = Banner::where('type', 'event')->orderby('position', 'asc')->where('active', 1)->get();

        // $events = Event::where('active', 1)->orderby('id', 'desc')->paginate(10);

        $sponsors = Sponsor::where('active', 1)->orderby('position', 'asc')->get();

        $promotionPublics = PromotionPublic::with(['promotion.product'])
                ->where('position', '>', 0)
                ->whereHas('promotion.product', function ($query) {
                    $query->where('active', 1)
                        ->where('isdelete', 0);
                })
                ->whereIn('menu_fk', [10000, 10001, 10002])
                ->orderBy('menu_fk')
                ->orderBy('position')
                ->get()
                ->groupBy('menu_fk');

        $promotions_KS = $promotionPublics[10000] ?? collect();
        $promotions_NH = $promotionPublics[10001] ?? collect();
        $promotions_KVC = $promotionPublics[10002] ?? collect();

        return view('frontend.home.event', [
            'banners' => $banners,
            'events' => $events,
            'promotions_KS' => $promotions_KS,
            'promotions_NH' => $promotions_NH,
            'promotions_KVC' => $promotions_KVC,
            'sponsors' => $sponsors
        ]);
    }

    public function page(Request $request){
        $page = Page::where('slug', $request->slug)->first();
        return view('frontend.home.page', [
            'page' => $page
        ]);
    }

    public function products(Request $request){
        $query = Product::query();
        if($request->has('keyword')){
            $query = $query->where('name', 'like', '%' . $request->keyword . '%');
        }
        $products = $query->where('active', 1)->where('isdelete', 0)->orderby('id', 'desc')->paginate(10); 
        return view('frontend.home.products', [
            'products' => $products
        ]);
    }

    public function menu(Request $request){
        $menu = Menu::where('slug', $request->slug)->first();
        $products = Product::where('active', 1)->where('isdelete', 0)->where('menu_fk', $menu->id)->orderby('id', 'desc')->paginate(15); 
        return view('frontend.home.menu', [
            'products' => $products,
            'menu' => $menu
        ]);
    }

    public function detail(Request $request){
        $product = Product::find($request->id);
        $products = Product::where('active', 1)->where('isdelete', 0)->where('menu_fk', $product->menu->id)->where('id', '<>', $product->id)->get();
        $meta_keywords = $product->meta_keywords ? $product->name . ', ' .$product->meta_keywords : $product->name;
        return view('frontend.home.detail', [
            'product' => $product,
            'products' => $products,
            'meta_title' => $product->name,
            'meta_description' => $product->meta_description ?? 'Chuyên cung cấp thiết bị vật tư chính hãng với giá tốt nhất.',
            'meta_keywords' => $meta_keywords,
            'meta_og_image' => $product->image ? asset('uploads/'.$product->image->ten) : asset('images/default.jpg'),
            'meta_og_url' => route('frontend.home.detail',['id'=>$request->id, 'slug'=>$request->slug]),
            'meta_og_type' => 'product'
        ]);
    }

    public function contact(){
        return view('frontend.home.contact');
    }

    public function captcha()
    {
        return Captcha::create('math');
    }

    public function check_captcha(Request $request)
    {
        if (captcha_check($request->input('code_security'), true)) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }

    public function post_contact(Request $request){
        $validator = Validator::make($request->all(), [
            'name_txt'     => 'required|string|max:100',
            'address_txt'  => 'required|string|max:150',
            'phone_txt'      => 'required|string|max:15',
            'email_txt'    => 'required|email|max:100',
            'title_txt'  => 'required|string|max:100',
            'code_security' => ['required', function ($attribute, $value, $fail) {
                if (!captcha_check($value)) {
                    $fail('Mã bảo vệ không đúng.');
                }
            }]
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Contact::create(
            [
                'name' => $request->name_txt,
                'company' => $request->company_txt,
                'address' => $request->address_txt,
                'phone' => $request->phone_txt,
                'fax' => $request->fax_txt,
                'email' => $request->email_txt,
                'title' => $request->title_txt,
                'content' => $request->content_txt
            ]
        );

        return redirect()->route('frontend.home.contact')->with(['notice' => 'Đã gửi thành công. Chúng tôi sẽ liên hệ lại với bạn trong thời gian sớm nhất!']);
    }
}
