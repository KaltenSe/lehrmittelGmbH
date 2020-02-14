<?php

use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([

    'middleware' => ['api', 'CORS'],
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('sign-up', 'AuthController@signUp');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

Route::group([

    'middleware' => ['api', 'CORS'],
    'prefix' => 'articles'

], function ($router) {


    #Route::get('{articleId}', 'ArticleController@show');
    #Route::post('/', 'ArticleController@store');
});
