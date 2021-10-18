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

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();
//Login
Route::get('loginZeeAdmin', 'Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('loginZeeAdmin', 'Auth\LoginController@login')->name('loginPost');
//logout
Route::post('logoutZeeAdmin', 'Auth\LoginController@logout')->name('admin.logout');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('hadiah','ZeeController@hadiahView')->name('hadiah');
Route::post('hadiah','ZeeController@hadiahPost')->name('hadiahPost');

Route::get('peserta','ZeeController@pesertaView')->name('importPeserta');
Route::post('peserta','ZeeController@pesertaPost')->name('importPesertaPost');

Route::get('pemenang','ZeeController@pemenangView')->name('exportPeserta');
Route::post('pemenang','ZeeController@pemenangPost')->name('exportPesertaPost');

Route::post('generatePemenang','PemenangController@generatePemenang')->name('generatePemenang');
Route::get('reset','PemenangController@ResetAll')->name('resetAll');
Route::get('Index','PemenangController@Index')->name('Index');

