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

Route::get('/', 'PagesController@index');
Route::get('/game', 'PagesController@game');

Route::group(['prefix' => '/auth'], function () {
    Route::post('/registration', 'AuthController@registration');
    Route::post('/login', 'AuthController@login');
    Route::get('/vk', 'AuthController@authVK');
    Route::get('/vk/callback', 'AuthController@vkCallback');
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('/bet', 'GameController@bet');

    Route::group(['prefix' => 'user'], function () {
        Route::post('/getBonus', 'UserController@getBonus');
        Route::post('/resetPass', 'UserController@resetPass');
        Route::post('/deposit', 'UserController@deposit');
        Route::post('/withdraw', 'UserController@withdraw');
        Route::post('/removeWithdraw', 'UserController@removeWithdraw');
    });
});

Route::get('/logout', 'AuthController@logout');
