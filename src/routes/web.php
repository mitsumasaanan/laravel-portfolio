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
Route::get('/', 'AccomodationController@index')->name('top');

//認証系(ユーザー登録、ログイン、ログアウト)ルーティング
Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/user', 'UserController@show')->name('user.show');
    Route::resource('user', 'UserController', ['only' => ['edit', 'update']]);
    Route::resource('articles', 'AccomodationController', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
});
Route::resource('articles', 'AccomodationController', ['only' => ['show']]);
