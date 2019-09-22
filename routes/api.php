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
Route::get('/{username}/{collection_name}','TableController@index')->middleware(['checkApiKey','CheckRemainingRequest']);
Route::post('/{username}/{collection_name}','TableController@store')->middleware(['checkApiKey','CheckContent','CheckRemainingRequest']);
Route::get('/{username}/{collection_name}/{object_id}','TableController@show')->middleware(['checkApiKey','CheckRemainingRequest']);
Route::put('/{username}/{collection_name}/{object_id}','TableController@update')->middleware(['checkApiKey','CheckContent']);
Route::delete('/{username}/{collection_name}/{object_id?}','TableController@destroy')->middleware(['checkApiKey','CheckRemainingRequest']);



/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/