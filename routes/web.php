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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index');

    Route::get('home', 'HomeController@index')->name('home');
    Route::post('home', 'HomeController@newPost')->name('new_post');

    Route::get('user/{username}', 'UserController@index')->name('user');
    Route::post('user/{username}/follow', 'UserController@follow')->name('follow');
    Route::post('user/{username}/unfollow', 'UserController@unfollow')->name('unfollow');

    Route::get('user/profile/edit', 'UserController@editForm')->name('user_edit');
    Route::post('user/profile/edit', 'UserController@edit');

    Route::post('post/{id}/like', 'PostController@like')->name('like');
    Route::post('post/{id}/unlike', 'PostController@unlike')->name('unlike');

    Route::get('post/{id}/reply', 'PostController@reply')->name('post_reply');
    Route::post('post/{id}/reply', 'PostController@replyNew');

    Route::get('search', 'SearchController@index')->name('search');
});