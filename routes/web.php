<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\frontend\FrontendController;

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

Auth::routes();

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
 });

 