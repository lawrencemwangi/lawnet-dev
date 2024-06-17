<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\InactiveUserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'HomePage'])->name('home');
Route::get('/about', [HomeController::class, 'AboutPage'])->name('about');
Route::get('/service', [HomeController::class, 'ServicePage'])->name('service');
Route::get('/contact', [HomeController::class, 'ContactPage'])->name('contact');
Route::get('/inactive', [InactiveUserController::class, 'InactivePage'])->name('inactive');

Route::get('/blog', [HomeController::class, 'BlogPage'])->name('blog');
Route::get('/blog/{blog}', [BlogController::class, 'show'])->name('show');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add/{id}',[CartController::class, 'add_to_cart'])->name('add_to_cart');
Route::post('cart/quatity/{id}',[CartController::class, 'change_quantity'])->name('update_cart');
Route::post('cart/remove/{id}',[CartController::class, 'delete_cart_item'])->name('delete_cart_item');

Route::get('/chat', [homecontroller::class, 'chatpage'])->name('chat');


Route::middleware('auth','status')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/checkout', [OrderController::class, 'check_out_cart'])->name('check_out');
    Route::post('/order', [OrderController::class, 'post_checkout'])->name('post_checkout');
    Route::get('/order/success', [OrderController::class, 'post_order'])->name('post_order');
    Route::get('/dashboard', [OrderController::class, 'list_orders'])->name('list_orders');
});


Route::middleware('auth', 'admin','status')->group(function(){
    Route::get('/admin/dashboard', [DashboardController::class, 'admin_dashboard'])->name('admin_dashboard');

    Route::resource('/admin/blog', BlogController::class);

    Route::resource('/admin/message', MessageController::class);

    Route::resource('/admin/category', CategoryController::class);

    Route::resource('/admin/service', ServiceController::class);

    Route::resource('/admin/projects', ProjectController::class);

    Route::resource('/admin/user', UserController::class);

    Route::resource('/admin/chat', ChatController::class);

    Route::resource('/admin/orders', OrderController::class);
});


require __DIR__.'/auth.php';
