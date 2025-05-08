<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Banner;
use App\Models\Menu;
use App\Models\Page;

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

        view()->share([
            'banners'=> $banners,
            'menus'=> $menus,
            'pages' => $pages,
            'meta_title' => 'Asimat - Thiết bị vật tư chính hãng',
            'meta_description' => 'Chuyên cung cấp thiết bị vật tư chính hãng với giá tốt nhất.',
            'meta_keywords' => 'asimat, thiet bi, thiết bị, vat tu, vật tư, thiet bi vat tu, thiết bị vật tư',
            'meta_og_image' => asset('images/default.jpg'),
            'meta_og_url' => '',
            'meta_og_type' => 'website'
        ]);
    }
}
