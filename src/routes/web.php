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

Route::get('/accomodations/search', 'AccomodationController@search')->name('accomodations.search');

//認証系(ユーザー登録、ログイン、ログアウト)ルーティング
Auth::routes();

//ゲストユーザーログイン
Route::get('guest', 'Auth\LoginController@guestLogin')->name('login.guest');

//退会確認ページ
Route::get('user/deleteconfirm','UserController@delete_confirm')->name('user.delete_confirm');

Route::group(['middleware' => ['auth']], function() {
    Route::group(['prefix' => 'accomodations/{id}'],function(){
        Route::post('/favorite', 'FavoriteController@store')->name('favorite');
        Route::post('/unfavorite', 'FavoriteController@destroy')->name('unfavorite');
    });

    Route::get('/user', 'UserController@show')->name('user.show');
    Route::resource('user', 'UserController', ['only' => ['edit', 'update', 'destroy']]);
    Route::resource('accomodations', 'AccomodationController', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    Route::post('comments', 'CommentsController@store')->name('comments.store');
});

Route::resource('accomodations', 'AccomodationController', ['only' => ['show']]);
Route::get('user/{id}/favorite', 'UserController@favorite')->name('user.favorite');

