<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*|--------------------------------------------------------------------------
| Jurusan
|--------------------------------------------------------------------------*/
Route::get('/jurusan', 'JurusanController@index')->middleware('auth');
Route::post('/jurusan/store', 'JurusanController@store')->middleware('auth');
Route::get('/jurusan/edit/{id}', 'JurusanController@edit')->middleware('auth');
Route::put('/jurusan/update/{id}', 'JurusanController@update')->middleware('auth');
Route::get('/jurusan/hapus/{id}', 'JurusanController@delete')->middleware('auth');
Route::get('jurusan-list', 'JurusanController@jurusanlist'); 
/*|--------------------------------------------------------------------------
| Akhir Jurusan
|--------------------------------------------------------------------------*/


/*|--------------------------------------------------------------------------
| Kelas
|--------------------------------------------------------------------------*/
Route::get('/kelas', 'KelasController@index')->middleware('auth');
Route::get('/kelas/tambah', 'KelasController@tambah')->middleware('auth');
Route::post('/kelas/store', 'KelasController@store')->middleware('auth');
Route::get('/kelas/edit/{id}', 'KelasController@edit')->middleware('auth');
Route::put('/kelas/update/{id}', 'KelasController@update')->middleware('auth');
Route::get('/kelas/hapus/{id}', 'KelasController@delete')->middleware('auth');
/*|--------------------------------------------------------------------------
| Akhir Kelas
|--------------------------------------------------------------------------*/

/*|--------------------------------------------------------------------------
| Dosen
|--------------------------------------------------------------------------*/
Route::get('/dosen', 'DosenController@index')->middleware('auth');
Route::get('/dosen/tambah', 'DosenController@tambah')->middleware('auth');
Route::post('/dosen/store', 'DosenController@store')->middleware('auth');
Route::get('/dosen/edit/{id}', 'DosenController@edit')->middleware('auth');
Route::put('/dosen/update/{id}', 'DosenController@update')->middleware('auth');
Route::get('/dosen/hapus/{id}', 'DosenController@delete')->middleware('auth');
/*|--------------------------------------------------------------------------
| Akhir Dosen
|--------------------------------------------------------------------------*/

/*|--------------------------------------------------------------------------
| Mata Kuliah
|--------------------------------------------------------------------------*/
Route::get('/mata_kuliah', 'Mata_kuliahController@index')->middleware('auth');
Route::get('/mata_kuliah/tambah', 'Mata_kuliahController@tambah')->middleware('auth');
Route::post('/mata_kuliah/store', 'Mata_kuliahController@store')->middleware('auth');
Route::get('/mata_kuliah/edit/{id}', 'Mata_kuliahController@edit')->middleware('auth');
Route::put('/mata_kuliah/update/{id}', 'Mata_kuliahController@update')->middleware('auth');
Route::get('/mata_kuliah/hapus/{id}', 'Mata_kuliahController@delete')->middleware('auth');
/*|--------------------------------------------------------------------------
| Akhir Mata Kuliah
|--------------------------------------------------------------------------*/

/*|--------------------------------------------------------------------------
| Absensi
|--------------------------------------------------------------------------*/
Route::get('/absensi', 'AbsensiController@index')->middleware('auth');
Route::get('/absensi/tambah', 'AbsensiController@tambah')->middleware('auth');
Route::post('/absensi/store', 'AbsensiController@store')->middleware('auth');
Route::get('/absensi/edit/{id}', 'AbsensiController@edit')->middleware('auth');
Route::put('/absensi/update/{id}', 'AbsensiController@update')->middleware('auth');
Route::get('/absensi/hapus/{id}', 'AbsensiController@delete')->middleware('auth');
/*|--------------------------------------------------------------------------
| Akhir Absensi
|--------------------------------------------------------------------------*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
