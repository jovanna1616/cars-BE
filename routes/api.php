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



Route::middleware('api')->group(function () {
	// index
	Route::get('/cars', 'CarController@index');
	// store
	Route::post('/cars', 'CarController@store');
	// show
	Route::get('/cars/{id}', 'CarController@show');
	// update
	Route::put('/cars/{id}', 'CarController@update');
	// delete
	Route::delete('/cars/{id}', 'CarController@destroy');

});