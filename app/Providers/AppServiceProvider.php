<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Banner;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Blog;

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
        $blogsF = Blog::where('active', 1)->orderby('id', 'desc')->take(4)->get();
        $bannerList = Banner::whereBetween('id', [1000, 1010])->get()->keyBy('id');

        view()->share([
            'banners'=> $banners,
            'menus'=> $menus,
            'pages' => $pages,
            'blogsF' => $blogsF,
            'bannerList' => $bannerList,
            'meta_title' => 'Bariavungtau tourism - Sở du lịch Bà Rịa Vũng Tàu',
            'meta_description' => 'Trang thông tin du lịch Bà Rịa Vũng Tàu Tourism.',
            'meta_keywords' => 'bariavungtau tourism, tourism, du lich, so du lich, so du lich ba ria vung tau',
            'meta_og_image' => asset('images/default.jpg'),
            'meta_og_url' => 'https://dev.dulichbariavungtau.vn/',
            'meta_og_type' => 'website'
        ]);
    }
}
