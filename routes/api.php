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


// index
Route::middleware('api')->get('/cars', 'CarController@index');
// store
Route::middleware('api')->post('/cars', 'CarController@store');
// show
Route::middleware('api')->get('/cars/{id}', 'CarController@show');
// update
Route::middleware('api')->put('/cars/{id}', 'CarController@update');
// delete
Route::middleware('api')->delete('/cars/{id}', 'CarController@destroy');
