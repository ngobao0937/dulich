<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Banner;
use App\Models\Partner;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Website;

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

        $banners = Banner::where('active', 1)->where('type', 'main')->orderby('position', 'asc')->get();
        $partners = Banner::where('active', 1)->where('type', 'partner')->orderby('position', 'asc')->get();
        $customers = Banner::where('active', 1)->where('type', 'customer')->orderby('position', 'asc')->get();
        $pages = Page::whereIn('id', [10002,10003,10004,10005])->get();
        $pageTc = Page::find(10000);
        $pageGt = Page::find(10001);
        $menus = Menu::where('active', 1)->get();
        $websites = Website::where('active', 1)->get();

        view()->share([
            'banners'=> $banners,
            'partners' => $partners,
            'customers' => $customers,
            'menus'=> $menus,
            'websites' => $websites,
            'pages' => $pages,
            'pageTc' => $pageTc,
            'pageGt' => $pageGt,
            'meta_title' => '',
            'meta_description' => '',
            'meta_keywords' => '',
            'meta_og_image' => asset('images/default.jpg'),
            'meta_og_url' => '',
            'meta_og_type' => 'website'
        ]);
    }
}
