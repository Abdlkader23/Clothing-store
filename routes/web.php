<?php

use Illuminate\Support\Facades\Route;
use App\Models\product;
use App\Models\varieties;
use App\Models\cart;


use App\Http\Controllers\ProductController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\cartController;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [MainPageController::class, 'mainPage']);
Route::get('/reviews', [MainPageController::class, 'reviews']);
Route::get('/product/{catid?}', [ProductController::class, 'GetCtgoryProduct']);
Route::get('/singleproduct/{catid?}', [ProductController::class, 'singleproduct']);
Route::get('/varietie', [ProductController::class, 'GetCategoryWhsesProduct']);
Route::get('/addProduct', [ProductController::class, 'addProduct']);
Route::get('/editproduct/{productid?}', [ProductController::class, 'editproduct']);
Route::get('/addproductimg/{productid?}', [ProductController::class, 'addproductimg']);
Route::get('/deletproduct/{productid}', [ProductController::class, 'deletproduct']);
Route::get('/removeproductimag/{productid}', [ProductController::class, 'removeproductimag']);
Route::post('/storereview', [MainPageController::class, 'storereview']);
Route::post('/storproduct', [ProductController::class, 'Addproductstor']);
Route::post('/storproductimag', [ProductController::class, 'storproductimag']);
Route::post('/search', [ProductController::class, 'search']);
Route::post('/storhadersubtitle', [adminController::class, 'storhadersubtitle']);
Route::post('/StorOrder', [cartController::class, 'StorOrder']);
Route::get('admin', [adminController::class, 'admin'])->middleware('admin');
Route::get('page', [adminController::class, 'page']);
Route::get('order', [adminController::class, 'order']);
Route::get('Hader', [adminController::class, 'Hader']);
Route::get('edithader/{haderid}', [adminController::class, 'edithader']);
Route::get('Footer', [adminController::class, 'Footer']);
Route::get('/cart', [cartController::class, 'cart'])->middleware('auth');
Route::get('/completeorder', [cartController::class, 'completeorder'])->middleware('auth');
Route::get('/addcart/{productid}', [cartController::class, 'addcart'])->middleware('auth');
Route::get('/deletorder/{productid}', [cartController::class, 'deletorder'])->middleware('auth');
Route::get('/deletecart/{orderId}', function ($cartid) {
    Cart::find($cartid)->delete();
    return redirect('/cart');
});
Route::post('/cart/increase/{cart_id}', [cartController::class, 'increaseQuantity'])->name('cart.increaseQuantity');
Route::post('/cart/decrease/{id}', [cartController::class, 'decreaseQuantity'])->name('cart.decrease');
