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

Route::get('/test' ,'StockController@index');
//Route::get('/contact' ,'ContactController@index','MyController@importExportView');
Route::get('stock/chart','StockController@chart');

Route::resource('/contact','ContactController');
Route::post('/contact/update','ContactController@update');
Route::get('/contact/edit/{id}','ContactController@edit');

Route::get ('/contact/hapus/{contact_id}','ContactController@destroy');

Route::get('pelanggan','ContactController@test');
Route::get('pelanggan/cari','ContactController@cari');

Route::get('export', 'MyController@export')->name('export');
Route::get('importExportView', 'MyController@importExportView');
Route::post('import', 'MyController@import')->name('import');

Route::get('/statusall', 'StatusallController@index');
Route::post('Statusall/action', 'StatusallController@action')->name('Statusall.action');

Route::get('/ganticontact', 'GanticontactController@index');
Route::post('ganticontact/action', 'GanticontactController@action')->name('Ganticontact.action');

Route::get('/penugasan', 'PenugasanController@index');
Route::post('penugasan/simpan', 'PenugasanController@simpan');

Route::resource('/leads', 'LeadsController');
Route::post('/leads/update','LeadsController@update');
Route::get('/leads/edit/{id}','LeadsController@edit');
Route::get('/leads/tambah','LeadsController@show');
Route::post('/leads/store','LeadsController@store');

Route::resource('/opportunities', 'OpportunitiesController');
Route::post('/opportunities/update','OpportunitiesController@update');
Route::get('/opportunities/edit/{id}','OpportunitiesController@edit');
Route::get('/opportunities/tambah','OpportunitiesController@show');
Route::post('/opportunities/store','OpportunitiesController@store');

Route::resource('/won', 'WonController');
Route::post('/won/update','WonController@update');
Route::get('/won/edit/{id}','WonController@edit');
Route::get('/won/tambah','WonController@show');
Route::post('/won/store','WonController@store');

    