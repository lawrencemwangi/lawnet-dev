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
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'HomePage'])->name('home');
Route::get('/about', [HomeController::class, 'AboutPage'])->name('about');
Route::get('/service', [HomeController::class, 'ServicePage'])->name('service');
Route::get('/blog', [HomeController::class, 'BlogPage'])->name('blog');
Route::get('/contact', [HomeController::class, 'ContactPage'])->name('contact');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth', 'admin')->group(function(){
    Route::get('/admin/dashboard', [DashboardController::class, 'admin_dashboard'])->name('admin_dashboard');

    Route::get('/admin/project', [ProjectController::class, 'index'])->name('list_project');

    Route::resource('/admin/blog', BlogController::class);

    Route::resource('/admin/message', MessageController::class);

    Route::resource('/admin/category', CategoryController::class);

    Route::resource('/admin/service', ServiceController::class);

    Route::resource('/admin/user', UserController::class);
});


require __DIR__.'/auth.php';
