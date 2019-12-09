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

Auth::routes();
// Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

// Admin

Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('role');

// Admin for Siswa

Route::get('datasiswa', 'HomeController@adminSiswa')->name('admin.inputsiswa')->middleware('role');
Route::get('admin/viewinputsiswa', 'HomeController@viewInputSiswa')->name('admin.viewinputsiswa')->middleware('role');
Route::post('admin/inputsiswa', 'HomeController@adminInputSiswa')->name('admin.forinputsiswa')->middleware('role');
Route::get('admin/updatesiswa/{id}', 'HomeController@adminUpdateSiswaView')->name('admin.updatesiswaview')->middleware('role');
Route::put('admin/updatedatasiswa/{id}', 'HomeController@adminUpdateDataSiswa')->middleware('role');
Route::get('admin/deletesiswa/{id}', 'HomeController@adminDeleteSiswa')->middleware('role');
Route::get('datasiswa/cari', 'HomeController@adminCariDataSiswa')->middleware('role');

// Admin for Guru

Route::get('dataguru', 'HomeController@adminGuru')->name('guru.home')->middleware('role');
Route::get('admin/viewinputguru', 'HomeController@viewInputGuru')->name('admin.viewinputguru')->middleware('role');
Route::post('admin/inputguru', 'HomeController@adminInputGuru')->name('admin.forinputsiswa')->middleware('role');
Route::get('admin/updateguru/{id}', 'HomeController@adminUpdateGuruView')->name('admin.updatesiswaview')->middleware('role');
Route::put('admin/updatedataguru/{id}', 'HomeController@adminUpdateDataGuru')->middleware('role');
Route::get('admin/deleteguru/{id}', 'HomeController@adminDeleteGuru')->middleware('role');
Route::get('dataguru/cari', 'HomeController@adminCariDataGuru')->middleware('role');


// Guru
Route::get('guru/home', 'HomeController@guruDashboard')->name('guru.home')->middleware('role');
Route::get('guru/datasiswa', 'HomeController@guruViewSiswa')->middleware('role');
Route::get('gurudatasiswa/cari', 'HomeController@guruCariDataSiswa')->middleware('role');
Route::get('guru/inputnilai/{id}', 'HomeController@guruInputNilai')->name('input.nilai')->middleware('role');
//Siswa

Route::get('siswa/home', 'HomeController@siswaHome')->name('siswa.home')->middleware('role');
