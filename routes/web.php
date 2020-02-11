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


Route::get('/uploadfile', 'UploadfileController@index');
Route::post('/uploadfile', 'UploadfileController@upload');
Route::get('/login','MainController@index')->name('login');
Route::post('/login/checklogin', 'MainController@checklogin');
Route::get('login/successlogin', 'MainController@successlogin');
Route::get('login/logout', 'MainController@logout');
Route::get('login/register','MainController@register');
Route::post('login/register','MainController@registeruser');
Route::get('login/forgot', 'MainController@forgot')->name('forgot');
Route::post('login/forgot', 'MainController@forgotpassword');
Route::get('dashboard', 'MainController@panel')->name('dashboard');
Route::get('dashboard/reporter', 'MainController@reporter')->middleware('auth');
Route::get('panel', 'MainController@dashboardu')->name('panel')->middleware('auth');
Route::post('panel','MainController@generarreporte')->name('tickets')->middleware('auth');
Route::get('ticket', 'MainController@ticket')->middleware('auth');
//Route::get('panele', 'MainController@ticket');

