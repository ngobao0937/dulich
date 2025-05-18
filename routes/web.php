<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ExtensionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;

Route::get('/', [HomeController::class, 'index'])->name('frontend.home.index');

Route::get('/tr{id}-{slug}', [PageController::class, 'detail'])->name('frontend.page.detail');

Route::get('/su-kien', [HomeController::class, 'event'])->name('frontend.home.event');

Route::get('/blog{id}-{slug}', [BlogController::class, 'detail'])->name('frontend.blog.detail');

Route::get('/khuyen-mai-uu-dai', [ProductController::class, 'promotions'])->name('frontend.product.promotions');

Route::get('/ks{id}-{slug}', [ProductController::class, 'detail'])->name('frontend.product.detail');

Route::post('/gui-phan-hoi', [CommentController::class, 'store'])->name('frontend.comment.store');

Route::post('/dang-ky-nhan-khuyen-mai', [CustomerController::class, 'store'])->name('frontend.customer.store');


// Route::get('/uudai', function(){
//     return view('frontend.home.uudai');
// });

// Route::get('/event', function(){
//     return view('frontend.home.event');
// });

// Route::get('/event_con', function(){
//     return view('frontend.home.event_con');
// });

// Route::get('/tr-{slug}', [HomeController::class, 'page'])->name('frontend.home.page');

// Route::get('/san-pham', [HomeController::class, 'products'])->name('frontend.home.products');


// Route::get('/lien-he', [HomeController::class, 'contact'])->name('frontend.home.contact');

// Route::post('/gui-lien-he', [HomeController::class, 'post_contact'])->name('frontend.home.post_contact');

// Route::get('/dm-{slug}', [HomeController::class, 'menu'])->name('frontend.home.menu');


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

    Route::get('/blog', [BlogController::class, 'index'])->name('backend.blog.index');
    Route::get('/blog/edit', [BlogController::class, 'edit'])->name('backend.blog.edit');
    Route::delete('/blog/delete', [BlogController::class, 'delete'])->name('backend.blog.delete');
    Route::post('/blog/store', [BlogController::class, 'store'])->name('backend.blog.store');

    Route::get('/banner', [BannerController::class,'index'])->name('backend.banner.index');
    Route::post('/banner/store', [BannerController::class,'store'])->name('backend.banner.store');
    Route::get('/banner/edit', [BannerController::class,'edit'])->name('backend.banner.edit');
    Route::delete('/banner/delete', [BannerController::class,'delete'])->name('backend.banner.delete');

    Route::get('/menu', [MenuController::class, 'index'])->name('backend.menu.index');
    Route::post('/menu/store', [MenuController::class, 'store'])->name('backend.menu.store');
    Route::get('/menu/edit', [MenuController::class, 'edit'])->name('backend.menu.edit');
    Route::delete('/menu/delete', [MenuController::class, 'delete'])->name('backend.menu.delete');

    // Route::get('/extension', [ExtensionController::class, 'index'])->name('backend.extension.index');
    // Route::post('/extension/store', [ExtensionController::class, 'store'])->name('backend.extension.store');
    // Route::get('/extension/edit', [ExtensionController::class, 'edit'])->name('backend.extension.edit');
    // Route::delete('/extension/delete', [ExtensionController::class, 'delete'])->name('backend.extension.delete');

    Route::get('/page', [PageController::class, 'index'])->name('backend.page.index');
    Route::post('/page/store', [PageController::class, 'store'])->name('backend.page.store');
    Route::get('/page/edit', [PageController::class, 'edit'])->name('backend.page.edit');

    Route::get('/product', [ProductController::class,'index'])->name('backend.product.index');
    Route::post('/product/store', [ProductController::class,'store'])->name('backend.product.store');
    Route::get('/product/create', [ProductController::class,'create'])->name('backend.product.create');
    Route::get('/product/edit', [ProductController::class,'edit'])->name('backend.product.edit');
    Route::delete('/product/delete', [ProductController::class,'delete'])->name('backend.product.delete');
    Route::delete('/product/delete-img', [ProductController::class,'deleteImg'])->name('backend.product.delete.img');

    // Route::get('/room', [RoomController::class,'index'])->name('backend.room.index');
    // Route::post('/room/store', [RoomController::class,'store'])->name('backend.room.store');
    // Route::get('/room/create', [RoomController::class,'create'])->name('backend.room.create');
    // Route::get('/room/edit', [RoomController::class,'edit'])->name('backend.room.edit');
    // Route::delete('/room/delete', [RoomController::class,'delete'])->name('backend.room.delete');
    // Route::delete('/room/delete-img', [RoomController::class,'deleteImg'])->name('backend.room.delete.img');

    // Route::get('/voucher', [VoucherController::class,'index'])->name('backend.voucher.index');
    // Route::post('/voucher/store', [VoucherController::class,'store'])->name('backend.voucher.store');
    // Route::get('/voucher/create', [VoucherController::class,'create'])->name('backend.voucher.create');
    // Route::get('/voucher/edit', [VoucherController::class,'edit'])->name('backend.voucher.edit');
    // Route::delete('/voucher/delete', [VoucherController::class,'delete'])->name('backend.voucher.delete');

    Route::get('/event', [EventController::class,'index'])->name('backend.event.index');
    Route::post('/event/store', [EventController::class,'store'])->name('backend.event.store');
    Route::get('/event/create', [EventController::class,'create'])->name('backend.event.create');
    Route::get('/event/edit', [EventController::class,'edit'])->name('backend.event.edit');
    Route::delete('/event/delete', [EventController::class,'delete'])->name('backend.event.delete');
    Route::delete('/event/delete-img', [EventController::class,'deleteImg'])->name('backend.event.delete.img');


    // Route::get('/contact', [ContactController::class, 'index'])->name('backend.contact.index');
    // Route::post('/contact/store', [ContactController::class, 'store'])->name('backend.contact.store');
    // Route::delete('/contact/delete', [ContactController::class, 'delete'])->name('backend.contact.delete');
    // Route::get('/contact/edit', [ContactController::class, 'edit'])->name('backend.contact.edit');

    Route::get('/comment', [CommentController::class, 'index'])->name('backend.comment.index');
    Route::post('/comment/store', [CommentController::class, 'store'])->name('backend.comment.store');
    Route::delete('/comment/delete', [CommentController::class, 'delete'])->name('backend.comment.delete');
    Route::get('/comment/edit', [CommentController::class, 'edit'])->name('backend.comment.edit');
    Route::get('/comment/get-products', [CommentController::class, 'get_products'])->name('backend.comment.get_products');

    Route::get('/promotion', [PromotionController::class, 'index'])->name('backend.promotion.index');
    Route::post('/promotion/store', [PromotionController::class, 'store'])->name('backend.promotion.store');
    Route::get('/promotion/edit', [PromotionController::class, 'edit'])->name('backend.promotion.edit');
    Route::delete('/promotion/delete', [PromotionController::class, 'delete'])->name('backend.promotion.delete');

    Route::get('/customer', [CustomerController::class, 'index'])->name('backend.customer.index');
    Route::post('/customer/store', [CustomerController::class, 'store'])->name('backend.customer.store');
    Route::get('/customer/edit', [CustomerController::class, 'edit'])->name('backend.customer.edit');
    Route::delete('/customer/delete', [CustomerController::class, 'delete'])->name('backend.customer.delete');
});
