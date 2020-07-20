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

//get all cities
Route::get('/city', 'CityController@index');

//get specific city
Route::get('/city/{id}', 'CityController@city');

//add city
Route::post('/city', 'CityController@create');

//insert user
Route::post('/user', 'UserController@create');

//update user
Route::post('/user/{id}', 'UserController@update');
