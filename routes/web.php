<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SocialController;
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
Route::get('/register', [AuthController::class, 'formRegister'])->name('user.formRegister');
Route::post('/register', [AuthController::class, 'register'])->name('user.register');
Route::get('/singIn', [AuthController::class, 'formSingIn'])->name('user.formSingIn');
Route::post('/singIn', [AuthController::class, 'singIn'])->name('user.singIn');
Route::get('/', [ProductController::class,"product_in_index"])->name('home');
Route::post('/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/contact', function () {
    return view('users.layouts.contact');
});

Route::get('/categories', function () {
    return view('users.layouts.contact');
})->name('contact');

Route::get('/auth/redirect/{provider}', [SocialController::class, 'redirect']);
Route::get('/callback/{provider}', [SocialController::class, 'callback']);


Route::get('/product_detail/{id}',[ProductController::class,'product_detail'])->name('product_detail');


Route::middleware('auth')->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('/logOut', [AuthController::class, 'logout'])->name('user.logOut');
        Route::get('/edit', [UserController::class, 'edit'])->name('user.formEdit');
        Route::post('/edit/{id}', [UserController::class, 'update'])->name('user.update');
        Route::get('/changePW', [UserController::class, 'formChangePassword'])->name('user.formChangePW');
        Route::post('/changePW', [UserController::class, 'changePassword'])->name('user.changePW');
        Route::get('/cart',[CartController::class,'index'])->name('cart');
        Route::get('/cart_list',[CartController::class,'cart_list'])->name('cart-list');
        Route::get('/add_cart/{id}',[CartController::class,'addToCart'])->name('addCart');
        Route::get('/remove_card/{id}',[CartController::class,'remove'])->name('remove');
        Route::get('/check_out/',[ProductController::class,'checkout'])->name('check_out');
        Route::post('/check_out/',[BillController::class,'addBill'])->name('add_bill');


    });
    Route::prefix('admin')->group(function () {
        Route::get('/list_user', [UserController::class, 'index'])->name('admin.list_user');
        Route::get('{id}/delete_user', [UserController::class, 'destroy'])->name('admin.delete_user');
        Route::get('/user_buy', [BillController::class, 'viewProductBuy'])->name('admin.list_bills');
        Route::get('/delete_bill/{id}', [BillController::class, 'deleteBill'])->name('admin.delete_bill');

        Route::group(['prefix' => 'products'], function () {
            Route::get('/', [ProductController::class, 'index'])->name('products.index');
            Route::get('/create', [ProductController::class, 'create'])->name('products.create');
            Route::post('/create', [ProductController::class, 'store'])->name('products.store');
            Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
            Route::post('/{id}/edit', [ProductController::class, 'update'])->name('products.update');
            Route::get('/{id}/destroy', [ProductController::class, 'destroy'])->name('products.destroy');
//        Route::post('/searchByCity', [ProductController::class, 'searchByCity'])->name('products.searchByCity');
        });
        Route::group(['prefix' => 'categories'], function () {
            Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
            Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
            Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
            Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
            Route::post('/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
            Route::get('/{id}/delete', [CategoryController::class, 'destroy'])->name('categories.destroy');
        });

    });
});
