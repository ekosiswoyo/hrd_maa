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
    return view('auth.login');
});

Auth::routes();

Route::get('/index', 'HomeController@index')->name('index');
Route::get('/fptk', 'fptkController@index');
Route::post('/fptk', 'fptkController@store');
Route::get('/printfptk',  'fptkController@makePDF');
Route::get('/home_fptk','fptkController@view');
Route::get('/data-fptk/{id}/ubah', 'fptkController@ubahfptk');
Route::post('/data-fptk/{id}', 'fptkController@updatefptk');
Route::get('/data-fptk/{id}/proses', 'fptkController@proses');
Route::delete('/data-fptk/deleteData/{id}',['uses' => 'fptkController@destroy']);
Route::get('/data-fptk','fptkController@viewfptk');
Route::get('/printfptk/{id}','fptkController@print');
Route::get('/pelamar','PelamarController@index');
Route::get('/pengalaman/{idnik}','PelamarController@indexs')->name('pengalaman');
Route::get('/uploadfile/{idnik}','PelamarController@indexss')->name('file');
Route::post('/pengalaman/{idnik}','PelamarController@storepengalaman')->name('pengalaman');
Route::post('/uploadfile/{idnik}','PelamarController@storefile')->name('file');
Route::post('/pelamar', 'PelamarController@store');
Route::get('/data_pelamar','PelamarController@view');