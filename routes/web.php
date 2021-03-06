<?php

use Illuminate\Support\Facades\Route;
$url = "App\Http\Controllers";

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

Route::get('/', function () {
    return view('home');
});

Route::get('product/create', $url . '\productController@create');
Route::post('product/simpan', $url . '\productController@simpan');
Route::get('product/{product:product_slug}', $url. "\productController@showProduct");
Route::resource('product', $url . '\ProductController');
Route::get('product/edit/{product:product_slug}', $url . '\productController@edit');
Route::patch('product/update', $url . '\productController@update');


