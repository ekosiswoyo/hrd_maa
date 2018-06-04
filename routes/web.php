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
Route::get('/printfptk/{id}','fptkController@print');
Route::get('/pelamar','PelamarController@index');
Route::post('/pelamar', 'PelamarController@store');