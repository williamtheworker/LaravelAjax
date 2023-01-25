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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('get_providers', 'ProvidersController@get_providers');
Route::get('get_provider', 'ProvidersController@get_provider');
Route::post('add_provider', 'ProvidersController@add_provider');
Route::post('edit_provider', 'ProvidersController@edit_provider');
Route::post('delete_provider', 'ProvidersController@delete_provider');
Route::post('activate_provider', 'ProvidersController@activate_provider');