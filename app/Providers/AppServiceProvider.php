<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Banner;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Blog;
use App\Models\Other;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // view()->composer('*', function ($view) {
        //     $banners = Banner::where('active', 1)->orderby('position', 'asc')->get();

        //     $view->with([
        //         'banners' => $banners
        //     ]);
        // });

        $banners = Banner::where('active', 1)->orderby('position', 'asc')->get();
        $pages = Page::all();
        $menus = Menu::where('active', 1)->get();
        $blogsF = Blog::where('active', 1)->orderby('id', 'desc')->take(3)->get();
        // $bannerList = Banner::whereBetween('id', [1000, 1009])->get()->keyBy('id');
        $other3 = Other::whereBetween('id', [7, 16])->get()->keyBy('id');
        $page1 = Page::find(10000);
        $page2 = Page::find(10001);
        $linkF = Other::find(5);
        $chatbot = Other::find(6);
        view()->share([
            'banners'=> $banners,
            'menus'=> $menus,
            'pages' => $pages,
            'blogsF' => $blogsF,
            'other3' => $other3,
            'page1' => $page1,
            'page2' => $page2,
            'linkF' => $linkF,
            'chatbot' => $chatbot,
            'meta_title' => 'Bariavungtau tourism - Sở du lịch Bà Rịa Vũng Tàu',
            'meta_description' => 'Trang thông tin du lịch Bà Rịa Vũng Tàu Tourism.',
            'meta_keywords' => 'bariavungtau tourism, tourism, du lich, so du lich, so du lich ba ria vung tau',
            'meta_og_image' => asset('images/default.jpg'),
            'meta_og_url' => 'https://dev.dulichbariavungtau.vn/',
            'meta_og_type' => 'website'
        ]);
    }
}
