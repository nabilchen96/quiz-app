<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/login', 'App\Http\Controllers\AuthController@login')->name('login');
Route::get('/', 'App\Http\Controllers\AuthController@login')->name('login');
Route::post('/loginProses', 'App\Http\Controllers\AuthController@loginProses')->name('loginProses');
Route::get('/logout', function () {
    Auth::logout();
    return redirect('login');
})->name('logout');

Route::group(['middleware' => 'auth'], function () {


    Route::get('/dashboard', function(){
        return view('welcome');
    });

    //user
    Route::get('/user', 'App\Http\Controllers\UserController@index');
    Route::get('/data-user', 'App\Http\Controllers\UserController@data');
    Route::post('/user-store', 'App\Http\Controllers\UserController@store');
    Route::post('/user-update', 'App\Http\Controllers\UserController@update');
    Route::post('/user-delete', 'App\Http\Controllers\UserController@delete');
    
    //Soal
    Route::get('/soal', 'App\Http\Controllers\SoalController@index');
    Route::get('/data-soal', 'App\Http\Controllers\SoalController@data');
    Route::post('/soal-store', 'App\Http\Controllers\SoalController@store');
    Route::post('/soal-update', 'App\Http\Controllers\SoalController@update');
    Route::post('/soal-delete', 'App\Http\Controllers\SoalController@delete');
    
    //Detail Soal as Pertanyaan
    Route::get('/detail-soal/{id}', 'App\Http\Controllers\PertanyaanController@index');
    Route::get('/pertanyaan', 'App\Http\Controllers\PertanyaanController@index');
    Route::get('/data-pertanyaan', 'App\Http\Controllers\PertanyaanController@data');
    Route::post('/pertanyaan-store', 'App\Http\Controllers\PertanyaanController@store');
    Route::post('/pertanyaan-update', 'App\Http\Controllers\PertanyaanController@update');
    Route::post('/pertanyaan-delete', 'App\Http\Controllers\PertanyaanController@delete');


    //daftar soal
    Route::get('/list-soal', 'App\Http\Controllers\ListSoalController@index');

    //kerjakan soal
    Route::get('/kerjakan-soal/{id}', 'App\Http\Controllers\JawabanController@index');
    Route::post('/store-kerjakan-soal/{id}', 'App\Http\Controllers\JawabanController@store');
    
    
    //nilai
    Route::get('/selesai-kerjakan-soal', 'App\Http\Controllers\NilaiController@index');
    Route::get('/nilai', 'App\Http\Controllers\NilaiController@index');
    Route::get('/data-nilai', 'App\Http\Controllers\NilaiController@data');
    Route::get('/detail-nilai/{id}', 'App\Http\Controllers\NilaiController@detail');

});

