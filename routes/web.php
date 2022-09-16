<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);

Route::get('category', [App\Http\Controllers\Frontend\FrontendController::class, 'category']);

Route::get('category/{slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewcategory']);

Route::get('category/{cate_slug}/{prod_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'productview']);

Auth::routes();

//home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//cart
Route::post('add-to-cart', [App\Http\Controllers\Frontend\CartController::class, 'addproduct']);

Route::post('update-cart', [App\Http\Controllers\Frontend\CartController::class, 'updatecart']);

Route::post('delete-cart-item', [App\Http\Controllers\Frontend\CartController::class, 'deleteproduct']);

Route::middleware(['auth'])->group(function () {
    Route::get('cart', [App\Http\Controllers\Frontend\CartController::class, 'viewcart']);

    //checkout

    Route::get('checkout', [App\Http\Controllers\Frontend\CheckoutController::class, 'index']);

    Route::post('place-order', [App\Http\Controllers\Frontend\CheckoutController::class, 'placeorder']);

    //my orders

    Route::get('my-orders', [App\Http\Controllers\Frontend\UserController::class, 'index']);

});




Route::middleware(['auth', 'isAdmin'])->group(function () {
//frontend
    Route::get('/dashboard', [App\Http\Controllers\Admin\FrontendController::class, 'index']);


    //categories
    Route::get('categories', [App\Http\Controllers\Admin\CategoryController::class, 'index']);

    Route::get('add_category', [App\Http\Controllers\Admin\CategoryController::class, 'add']);

    Route::post('insert-category', [App\Http\Controllers\Admin\CategoryController::class, 'insert']);

    Route::get('edit.category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);

    Route::put('update.category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);

    Route::get('delete.category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'delete']);


    //Products
    Route::get('products', [App\Http\Controllers\Admin\ProductController::class, 'index']);

    Route::get('add_products', [App\Http\Controllers\Admin\ProductController::class, 'add']);

    Route::post('insert-product', [App\Http\Controllers\Admin\ProductController::class, 'insert']);

    Route::get('edit.product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'edit']);

    Route::put('update.product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update']);

    Route::get('delete.product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'delete']);


});

//total price in the oders table doesn't match
// some product showing out of stock yet in stock
// you cannot order more than three items
