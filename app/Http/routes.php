<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('nama-url', ['middleware'=>'guest', 'uses'=>'MyController@myMethod']);

// Route::get('/welcome', 'TestController@showAbout');

Route::get('/tesmodel', function () {
    $mahasiswa = App\Mahasiswa::all();
    return $mahasiswa;
});
Route::auth();

Route::get('/home', 'HomeController@index');

// Admin
Route::group(['middleware' => 'web'], function() {
    Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'role:admin']], function () {
        Route::resource('mahasiswa', 'MahasiswaController');
        Route::resource('prodi', 'ProdiController');
    });
});

// Dosen
Route::group(['prefix'=>'dosen', 'middleware'=>['auth']], function () {
    // Route diisi disini...
});

// Mahasiswa
Route::group(['prefix'=>'mahasiswa', 'middleware'=>['auth']], function () {
    Route::resource('mahasiswa', 'BimbinganController');
});

Route::group(['middleware' => 'web'], function() {
    Route::group(['prefix'=>'mahasiswa', 'middleware'=>['auth', 'role:mahasiswa']], function () {
        Route::resource('pengajuanKp', 'PengajuanKpController');
        Route::resource('bimbingans', 'BimbinganController');
    });
});