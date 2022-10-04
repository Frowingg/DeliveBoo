<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route da fare per il frontend
// Route::get('/users', 'Api\UserController@index');

Route::get('/users/{slug}', 'Api\UserController@show');

Route::get('/dishes', 'Api\DishController@index');

Route::get('/categories', 'Api\CategoryController@index');

Route::get('/category/{id}', 'Api\CategoryController@showSingleCategory');

// Route::get('/users/{word}', 'Api\UserController@showFilteredUser');
