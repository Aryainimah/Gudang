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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>['auth']], function(){
Route::resource('/gudangs', 'GudangsController');
Route::resource('/history', 'HistoryController');
});

Route::get('/clear','GudangsController@drop');
Route::get('/pdf','PDFController@pdf');
Route::get('/getImport','ExcelController@getImport');
Route::post('/postImport','ExcelController@postImport');
Route::get('/deleteAll','ExcelController@deleteAll');
Route::get('/getExport','ExcelController@getExport');