<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\frontend\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\DashboardController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [FrontendController::class , 'index']);
Route::get('category', [FrontendController::class , 'category']);
Route::get('category/{slug}', [FrontendController::class , 'viewcategory']);
Route::get('category/{cate_slug}/{product_slug}', [FrontendController::class , 'viewproduct']);



Auth::routes();
Route::post('add-to-cart', [CartController::class , 'addProduct']);
Route::post('delete-cart-item', [CartController::class , 'deleteProduct']);
Route::post('update-cart-item', [CartController::class , 'updateProduct']);
Route::middleware(['auth'])->group(function (){
   Route::get('cart', [CartController::class , 'viewCart']);
   Route::get('checkout', [CheckoutController::class , 'index']);
   Route::post('place-order', [CheckoutController::class , 'placeOrder']);
   Route::get('my-orders', [UserController::class , 'index']);
   Route::get('view-order/{id}', [UserController::class , 'viewOrder']);
});

Route::get('/home', 'HomeController@index')->name('home');

 Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/dashboard', 'Admin\FrontendController@index');

    Route::get('/categories', 'Admin\CategoryController@index');
    Route::get('/add-category', 'Admin\CategoryController@add');
    Route::post('/insert-category', 'Admin\CategoryController@insert');
    Route::get('edit-category/{id}', 'Admin\CategoryController@edit');
    Route::post('/update-category/{id}', 'Admin\CategoryController@update');
    Route::get('/delete-category/{id}', 'Admin\CategoryController@destroy');


    Route::get('/products', 'Admin\ProductController@index');
    Route::get('/add-products', 'Admin\ProductController@add');
    Route::post('/insert-products', 'Admin\ProductController@insert');
    Route::get('edit-products/{id}', 'Admin\ProductController@edit');
    Route::post('/update-products/{id}', 'Admin\ProductController@update');
    Route::get('/delete-products/{id}', 'Admin\ProductController@destroy');


    Route::get('orders', [OrderController::class , 'index']);
    Route::get('admin/view-order/{id}', [OrderController::class , 'viewOrder']);
    Route::post('update-order/{id}', [OrderController::class , 'updateOrder']);

    Route::get('orders-history/', [OrderController::class , 'ordersHistory']);

    Route::get('users', [DashboardController::class , 'users']);
 });

 