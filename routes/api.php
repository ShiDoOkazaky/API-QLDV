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
Route::resource('quanly-donvi','App\Http\Controllers\DonviController');
// Route::get('quanly-donvi/search/{name}','App\Http\Controllers\DonviController@show');

//  Route::get('quanly-donvi-index','App\Http\Controllers\DonviController@index')->name('index');
//  Route::get('quanly-donvi-create','App\Http\Controllers\DonviController@create')->name('add');
//  Route::post('quanly-donvi-create','App\Http\Controllers\DonviController@store');
//  Route::get('quanly-donvi-update/{id}','App\Http\Controllers\DonviController@edit')->name('update');
//  Route::post('quanly-donvi-update','App\Http\Controllers\DonviController@update')->name('post-update');
//  Route::get('quanly-donvi-detele/{id}','App\Http\Controllers\DonviController@destroy')->name('delete');
Route::resource('quanly-nguoidung','App\Http\Controllers\CustomerController')->middleware('auth:sanctum');

Route::post('/auth/register','App\Http\Controllers\AuthController@createUser');

Route::post('/auth/login','App\Http\Controllers\AuthController@loginUser');