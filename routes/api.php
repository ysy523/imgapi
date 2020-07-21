<?php

use App\Http\Controllers\imgController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Use App\img;
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


Route::get('img/all','imageController@index');

Route::get('img/{id}','imageController@show');

Route::get('img/page/{id}','imageController@page');

Route::Post('img/create','imageController@store');


