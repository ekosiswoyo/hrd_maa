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

Route::post('/data-fptk/proses', 'fptkController@updateall');
Route::post('/pelamar/updateall', 'PelamarController@updateall');
Route::post('/pelamar/unproses', 'PelamarController@unprosesall');
Route::post('/data-fptk/selesai', 'fptkController@selesaiall');
Route::get('/index', 'HomeController@index')->name('index');
Route::post('/fptk/proses/update','fptkController@updateproses');
Route::get('/report', 'PelamarController@report');
Route::post('/report', 'fptkController@reportpdf');

Route::get('/homepelamar', 'PelamarController@homepelamar');
Route::get('/fptk', 'fptkController@index');
Route::post('/fptk', 'fptkController@store');
Route::get('/printfptk',  'fptkController@makePDF');
Route::get('/printfptknon',  'fptkController@makePDFnon');
Route::get('/home_fptk','fptkController@view');
Route::get('/data-fptk/{id}/ubah', 'fptkController@ubahfptk');
Route::get('/data-fptk/{id}/pelamarfptk', 'fptkController@pelamarfptk');
Route::get('/data-fptk/{id}/pelamar', 'fptkController@pelamar');
Route::get('/data-fptk/{id}/detail', 'fptkController@detail');
Route::get('/data-fptk/{id}/detailproses', 'fptkController@detailproses');
// Route::get('send', 'fptkController@store');
Route::post('/data-fptk/{id}', 'fptkController@updatefptk');
Route::get('/data-fptk/{id}/proses', 'fptkController@proses');
Route::delete('/data-fptk/deleteData/{id}',['uses' => 'fptkController@destroy']);
Route::get('/data-fptk','fptkController@viewfptk');
Route::get('/printfptk/{id}','fptkController@print');
Route::get('/pelamar','PelamarController@index');
Route::get('/pelamar/{idnik}/ubah', 'PelamarController@ubahpelamar');
Route::get('/pelamar/{idnik}/detail', 'PelamarController@detailpelamar');
Route::get('/pelamar/{idnik}/proses','PelamarController@proses');
Route::get('/pelamar/{idnik}/unproses','PelamarController@unproses');
Route::post('/pelamar/{idnik}', 'PelamarController@updatepelamar');
Route::get('/pengalaman/{idnik}','PelamarController@indexs')->name('pengalaman');
Route::get('/pengalaman/{idnik}/ubah','PelamarController@ubahpengalaman')->name('ubahpengalaman');
Route::get('/pengalaman/{idnik}/detail', 'PelamarController@detailpengalaman');
Route::get('/file/{idnik}/detail', 'PelamarController@detailfile');
Route::post('/pengalamankerja', 'PelamarController@updatepengalaman');
Route::get('/uploadfile/{idnik}/ubah','PelamarController@ubahfile')->name('ubahfile');
Route::post('/uploadfile', 'PelamarController@updatefile');
Route::post('/pengalaman/{idnik}','PelamarController@storepengalaman')->name('pengalaman');
Route::get('/uploadfile/{idnik}','PelamarController@indexss')->name('file');
Route::post('/uploadfile/{idnik}','PelamarController@storefile')->name('file');
Route::post('/pelamar', 'PelamarController@store');
Route::get('/data_pelamar','PelamarController@view');
Route::get('/lowongan','LowonganController@index');
Route::get('/lowongan/{id}/ubah', 'LowonganController@ubah');
Route::post('/lowongan/{id}', 'LowonganController@update');
Route::delete('/lowongan/deleteData/{id}',['uses' => 'LowonganController@destroy']);
Route::get('/tambahlowongan', 'LowonganController@view');
Route::post('/tambahlowongan', 'LowonganController@store');
Route::get('/proses','PelamarController@prosesseleksi');
Route::get('/proses/seleksi/{id}', 'PelamarController@proseleksi');
Route::post('/proses/seleksi/update','PelamarController@updateseleksi');
Route::get('/riwayat/{id}','PelamarController@riwayat');
Route::post('/pelamar/{id}/kerja','PelamarController@kerja');
Route::post('/pelamar/{id}/kerjafptk','fptkController@kerjafptk');

Route::get('/seleksi','SeleksiController@index');
Route::get('/seleksi/{id}/ubah', 'SeleksiController@ubah');
Route::post('/seleksi/{id}', 'SeleksiController@update');
Route::delete('/seleksi/deleteData/{id}',['uses' => 'SeleksiController@destroy']);
Route::get('/tambahseleksi', 'SeleksiController@view');
Route::post('/tambahseleksi', 'SeleksiController@store');
Route::post('/data_pelamar/proses','PelamarController@updateproses');
Route::post('/data_pelamar/prosessatu','PelamarController@prosessatu');
Route::get('/cetakfptk', 'fptkController@cetakfptk');
Route::get('/pelamar/{idnik}/fptkpelamar', 'PelamarController@fptkpelamar');
