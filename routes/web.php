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

//search
Route::get('product_list', [App\Http\Controllers\Frontend\FrontendController::class, 'productlistAjax']);

Route::post('searchproduct', [App\Http\Controllers\Frontend\FrontendController::class, 'searchproduct']);



Auth::routes();

//home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//cartitemcount
Route::get('/load-cart-data', [App\Http\Controllers\Frontend\CartController::class, 'cartcount']);

//wishlistitemcount
Route::get('/load-wishlist-data', [App\Http\Controllers\Frontend\WishlistController::class, 'wishlistcount']);



//cart
Route::post('add-to-cart', [App\Http\Controllers\Frontend\CartController::class, 'addproduct']);

Route::post('update-cart', [App\Http\Controllers\Frontend\CartController::class, 'updatecart']);

Route::post('delete-cart-item', [App\Http\Controllers\Frontend\CartController::class, 'deleteproduct']);

Route::post('add-to-wishlist', [App\Http\Controllers\Frontend\WishlistController::class, 'add']);

Route::post('remove-wishlist-item', [App\Http\Controllers\Frontend\WishlistController::class, 'destroy']);

Route::middleware(['auth'])->group(function () {
    Route::get('cart', [App\Http\Controllers\Frontend\CartController::class, 'viewcart']);

    //checkout

    Route::get('checkout', [App\Http\Controllers\Frontend\CheckoutController::class, 'index']);

    Route::post('place-order', [App\Http\Controllers\Frontend\CheckoutController::class, 'placeorder']);

    //my orders

    Route::get('my-orders', [App\Http\Controllers\Frontend\UserController::class, 'index']);

    Route::get('view-order/{id}', [App\Http\Controllers\Frontend\UserController::class, 'view']);

    //wishlist
    Route::get('wishlist', [App\Http\Controllers\Frontend\WishlistController::class, 'index']);


    //razorpay
    Route::post('proceed-to-pay', [App\Http\Controllers\Frontend\CheckoutController::class, 'razorpaycheck']);


    //rating
    Route::post('ratings', [App\Http\Controllers\Frontend\RatingsController::class, 'add']);

    //review

   Route::get('add_review/{product_slug}/user_review', [App\Http\Controllers\Frontend\ReviewController::class, 'review']);

   Route::post('add_review', [App\Http\Controllers\Frontend\ReviewController::class, 'create']);

   Route::get('edit_review/{product_slug}/user_review', [App\Http\Controllers\Frontend\ReviewController::class, 'edit']);

   Route::put('update_review', [App\Http\Controllers\Frontend\ReviewController::class, 'update']);
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


    //orderAdmin
    Route::get('orders', [App\Http\Controllers\Admin\OrderController::class, 'index']);

    Route::get('admin/view-order/{id}', [App\Http\Controllers\Admin\OrderController::class, 'view']);

    Route::put('update-order/{id}', [App\Http\Controllers\Admin\OrderController::class, 'update']);

    Route::get('order-history', [App\Http\Controllers\Admin\OrderController::class, 'orderhistory']);


    //usersAdmin
    Route::get('users', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::get('view.user/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'view']);




});

//total price in the oders table doesn't match
// some product showing out of stock yet in stock
// you cannot order more than three items
//wishlist swal/alert error
