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

// dapatkan data dari  api
Route::get('/note','App\Http\Controllers\NoteController@all');

// mengambil data berdasarkan id
Route::get('/note/{id}','App\Http\Controllers\NoteController@show');

// untuk menambah data
Route::post('/note','App\Http\Controllers\NoteController@store');

// untuk mengubah atau update data
Route::put('/note/{id}','App\Http\Controllers\NoteController@update');

// untuk menghapus data
Route::delete('/note/{id}','App\Http\Controllers\NoteController@delete');
