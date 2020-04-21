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
    return view('login');
});
Route::get('/login', 'AppController@index' );
Route::post('/login_proses', 'AppController@login_proses' );
Route::get('/logout', 'AppController@logout' );

Route::group(['middleware' => ['checklogin']], function () {
    Route::get('/dashboard', 'AppController@dashboard' );
    Route::get('/cari_pegawai/{nip}', 'AppController@pegawai' );
    Route::get('/ubah_password', 'AppController@ubah_password' );
    Route::post('/save_password', 'AppController@save_password' );


    Route::get('/pegawai', 'PegawaiController@index' );
    Route::get('/pegawai/search', 'PegawaiController@search' );

    Route::get('/satker', 'SatkerController@index' );
    Route::get('/satker/search', 'SatkerController@search' );

    Route::get('/cetak_kartu', 'CetakKartuController@index' );
    Route::get('/cetak_kartu/take/{nip}', 'CetakKartuController@take_photo' );
    Route::get('/cetak_kartu/upload/{nip}', 'CetakKartuController@upload_photo' );
    Route::post('/cetak_kartu/save_upload/', 'CetakKartuController@save_upload_photo' );

    Route::post('/cetak_kartu/save_gambar_depan/', 'CetakKartuController@save_gambar_depan' );
    Route::post('/cetak_kartu/save_gambar_belakang/', 'CetakKartuController@save_gambar_belakang' );

    Route::get('/cetak_kartu/cetak_depan/{nip}', 'CetakKartuController@cetak_depan' );
    Route::get('/cetak_kartu/cetak_belakang/{nip}', 'CetakKartuController@cetak_belakang' );


    Route::get('/pengajuan_perkawinan', 'PengajuanPerkawinan@index' );
    Route::get('/pengajuan_perkawinan/{id}', 'PengajuanPerkawinan@info' );
    Route::post('/pengajuan_perkawinan/save/{id}', 'PengajuanPerkawinan@save' );


});