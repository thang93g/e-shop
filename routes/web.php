<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login',[LoginController::class,'showFormLogIn'])->name('login');
Route::post('login',[LoginController::class,'login'])->name('checkLogin');
Route::get('register',[LoginController::class,'showFormRegister'])->name('showRegister');
Route::post('register',[UserController::class,'store'])->name('user.store');
Route::get('logout',[LoginController::class,'logOut'])->name('logout');


Route::get('',[HomeController::class,'showHome'])->name('home.showHome');
Route::get('shop',[HomeController::class,'showShop'])->name('home.showShop');


Route::middleware('auth')->prefix('admin')->group(function (){
    Route::prefix('product')->group(function (){
        Route::get('',[ProductController::class,'index'])->name('product.index');
        Route::post('',[ProductController::class,'store'])->name('product.store');
        Route::get('/{id}',[ProductController::class,'destroy'])->name('product.destroy');
        Route::post('/{id}',[ProductController::class,'update'])->name('product.update');
        Route::post('/img/{id}',[ImageController::class,'store'])->name('image.store');
        Route::get('/detail/{id}',[ImageController::class,'getProductImage'])->name('image.getProductImage');
        Route::get('/detail/{id}/{imgid}',[ImageController::class,'destroy'])->name('image.destroy');
    });

    Route::get('category',[CategoryController::class,'index'])->name('category.index');
    Route::get('category/add',[CategoryController::class,'create'])->name('category.create');
    Route::post('category/add',[CategoryController::class,'store'])->name('category.store');
    Route::get('category/{id}',[CategoryController::class,'destroy'])->name('category.destroy');

    Route::prefix('cart')->group(function (){
        Route::get('/',[CartController::class,'index'])->name('cart.index');
        Route::get('/delete/{id}',[CartController::class,'destroy'])->name('cart.destroy');
    });
});

Route::get('test/',function (){
    return view('front-end.cart');
});
