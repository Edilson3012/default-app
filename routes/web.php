<?php

use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Auth::routes();

Route::prefix('admin')->group(function(){
    Route::resource('product', ProductController::class);
});


// Route::prefix('/admin', function () {
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
