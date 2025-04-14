<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\WebsiteController;
use Mews\Captcha\Captcha;

Route::get('/', [HomeController::class, 'index'])->name('frontend.home.index');

Route::get('/tr-{slug}', [HomeController::class, 'page'])->name('frontend.home.page');

Route::get('/san-pham', [HomeController::class, 'products'])->name('frontend.home.products');

Route::get('/sp{id}-{slug}', [HomeController::class, 'detail'])->name('frontend.home.detail');

Route::get('/lien-he', [HomeController::class, 'contact'])->name('frontend.home.contact');

Route::get('/captcha', [HomeController::class, 'captcha'])->name('frontend.home.captcha');

Route::post('/check-captcha', [HomeController::class, 'check_captcha'])->name('frontend.home.check_captcha');

Route::post('/gui-lien-he', [HomeController::class, 'post_contact'])->name('frontend.home.post_contact');

Route::get('/dm-{slug}', [HomeController::class, 'menu'])->name('frontend.home.menu');


Route::get('/admin', [LoginController::class, 'login'])->name('backend.login');
Route::post('/check', [LoginController::class, 'check'])->name('backend.check');
Route::get('/logout', [LoginController::class, 'logout'])->name('backend.logout')->middleware('auth');

Route::middleware('auth')->prefix('/admin')->group(function () {
    Route::post('/ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');
    Route::post('/upload-image', [ImageController::class, 'uploadImage'])->name('backend.uploadImage');
    Route::post('/update-image-order', [ImageController::class, 'updateOrder'])->name('backend.update.image.order');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('backend.dashboard.index');

    Route::get('/user', [UserController::class, 'index'])->name('backend.user.index');
    Route::get('/user/edit', [UserController::class, 'edit'])->name('backend.user.edit');
    Route::delete('/user/delete', [UserController::class, 'delete'])->name('backend.user.delete');
    Route::post('/user/store', [UserController::class, 'store'])->name('backend.user.store');

    Route::get('/banner', [BannerController::class,'index'])->name('backend.banner.index');
    Route::post('/banner/store', [BannerController::class,'store'])->name('backend.banner.store');
    Route::get('/banner/edit', [BannerController::class,'edit'])->name('backend.banner.edit');
    Route::delete('/banner/delete', [BannerController::class,'delete'])->name('backend.banner.delete');

    Route::get('/menu', [MenuController::class, 'index'])->name('backend.menu.index');
    Route::post('/menu/store', [MenuController::class, 'store'])->name('backend.menu.store');
    Route::get('/menu/edit', [MenuController::class, 'edit'])->name('backend.menu.edit');
    Route::delete('/menu/delete', [MenuController::class, 'delete'])->name('backend.menu.delete');

    Route::get('/page', [PageController::class, 'index'])->name('backend.page.index');
    Route::post('/page/store', [PageController::class, 'store'])->name('backend.page.store');
    Route::get('/page/edit', [PageController::class, 'edit'])->name('backend.page.edit');

    Route::get('/product', [ProductController::class,'index'])->name('backend.product.index');
    Route::post('/product/store', [ProductController::class,'store'])->name('backend.product.store');
    Route::get('/product/create', [ProductController::class,'create'])->name('backend.product.create');
    Route::get('/product/edit', [ProductController::class,'edit'])->name('backend.product.edit');
    Route::delete('/product/delete', [ProductController::class,'delete'])->name('backend.product.delete');
    Route::delete('/product/deletePDF', [ProductController::class,'deletePDF'])->name('backend.product.deletePDF');

    Route::get('/contact', [ContactController::class, 'index'])->name('backend.contact.index');
    Route::post('/contact/store', [ContactController::class, 'store'])->name('backend.contact.store');
    Route::delete('/contact/delete', [ContactController::class, 'delete'])->name('backend.contact.delete');
    Route::get('/contact/edit', [ContactController::class, 'edit'])->name('backend.contact.edit');

    Route::get('/website', [WebsiteController::class, 'index'])->name('backend.website.index');
    Route::post('/website/store', [WebsiteController::class, 'store'])->name('backend.website.store');
    Route::delete('/website/delete', [WebsiteController::class, 'delete'])->name('backend.website.delete');
    Route::get('/website/edit', [WebsiteController::class, 'edit'])->name('backend.website.edit');
});
