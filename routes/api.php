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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// login
Route::post('/register','UserController@register');
Route::post('/login','UserController@login');

//api post
Route::get('/post','PostController@index');
Route::post('/post','PostController@store');
Route::get('/post/{id}','PostController@find');
Route::put('/post/{id}','PostController@update');
Route::delete('/post/{id}','PostController@destroy');
