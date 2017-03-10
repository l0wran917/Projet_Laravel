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

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->get('user/id/{id}', 'App\Api\Controllers\UserController@getById');
    $api->get('user/pseudo/{pseudo}', 'App\Api\Controllers\UserController@getByPseudo');
    $api->get('user/email/{email}', 'App\Api\Controllers\UserController@getByEmail');
    $api->get('user/all/', 'App\Api\Controllers\UserController@getAll');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
