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

Route::post('/android_login', 'AndroidController@login' );
Route::get('/data_cuti/{nip}', 'AndroidController@data_cuti');
Route::get('/status_cuti/{nip}', 'AndroidController@status_cuti');
Route::get('/download_surat/{id}', 'AndroidController@download_surat');


Route::post('/upload_photo', 'AndroidController@upload_photo' );


