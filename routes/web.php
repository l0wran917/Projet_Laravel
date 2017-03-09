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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::post('home', 'HomeController@newPost')->name('new_post');

Route::get('user/{username}', 'UserController@index')->name('user');
Route::post('user/{username}/follow', 'UserController@follow')->name('follow');
Route::post('user/{username}/unfollow', 'UserController@unfollow')->name('unfollow');


Route::get('search', 'SearchController@index')->name('search');

