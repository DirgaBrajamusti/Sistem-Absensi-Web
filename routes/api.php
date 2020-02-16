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

//API login register
Route::post('register', 'API\RegisterController@register');
Route::post('login', 'API\RegisterController@login');

//API data jurusan
Route::middleware('auth:api')->group( function () {
    Route::resource('jurusan', 'API\JurusanController');
});

//API data kelas
Route::middleware('auth:api')->group( function () {
    Route::resource('kelas', 'API\KelasController');
});
Route::get('data-kelas', 'API\KelasController@index');

//API data dosen
Route::middleware('auth:api')->group( function () {
    Route::resource('dosen', 'API\DosenController');
});

//API data mata_kuliah
Route::middleware('auth:api')->group( function () {
    Route::resource('mata_kuliah', 'API\Mata_kuliahController');
});
Route::get('data-mata_kuliah','API\Mata_kuliahController@index');

//API data absensi
Route::middleware('auth:api')->group( function () {
    Route::resource('absensi', 'API\AbsensiController');
});
Route::get('data-absensi', 'API\AbsensiController@index');

