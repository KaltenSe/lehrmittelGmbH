<?php

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

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('Artikel','ArticleController@index')->name('articles');
Route::get('Artikel/{articleId}','ArticleController@show')->name('article');
Route::get('Warenkorb', 'CartController@show')->name('cart');
Route::get('Bestellungen','OrderController@index')->name('orders');
#Route::get('Bestellungen/{Bestellung}','Order@show')->name('orders');
