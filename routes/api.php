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

Route::get('daftar', 'KontakController@index');
Route::get('daftar/{id}', 'KontakController@show');
Route::post('buat', 'KontakController@store');
Route::put('ubah/{id}', 'KontakController@update');
Route::delete('hapus/{id}', 'KontakController@destroy');
