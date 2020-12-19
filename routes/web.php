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

Route::get('/wel', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


route::get('/','App\Http\Controllers\HomeController@index');
route::get('/index','App\Http\Controllers\HomeController@index2')->name('index');


Route::get('/contact','App\Http\Controllers\ContactController@getcontact');


Route::get('/login','App\Http\Controllers\DashController@login');
Route::get('/register','App\Http\Controllers\DashController@register');
Route::post('/register/CreateAccount','App\Http\Controllers\DashController@createAccount');
Route::get('/checkLogin','App\Http\Controllers\DashController@Checklogin');


Route::get('/blog','App\Http\Controllers\ProductController@blog');
Route::get('/shopgrid','App\Http\Controllers\ProductController@shopgrid');
Route::get('/checkout','App\Http\Controllers\ProductController@checkout');
route::get('/cart','App\Http\Controllers\ProductController@cart');
Route::post('/addtocart','App\Http\Controllers\ProductController@addtocart');
Route::get('/products','App\Http\Controllers\ProductController@getviewproduct');