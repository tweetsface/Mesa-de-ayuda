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


Route::get('/login','MainController@index')->name('login');
Route::post('/login/checklogin','MainController@checklogin');
Route::get('/login/successlogin','MainController@successlogin');
Route::get('/login/logout','MainController@logout');
Route::get('/login/registrar','MainController@registrar');
Route::post('/login/registrar','MainController@registrarusuario');
Route::get('/login/recuperar','MainController@recuperar')->name('recuperar');
Route::post('/login/recuperar','MainController@forgotpassword');
Route::get('/dashboard','MainController@dashboard')->name('dashboard');
Route::get('/panel','MainController@panel')->name('panel');
Route::post('/panel','MainController@generarreporte')->name('tickets');
Route::get('/ticket','MainController@ticket')->name('ticket');
Route::post('/ticket','MainController@generarreporte')->name('ticket');
Route::get('/aticket','ControllerAdmin@ticket')->name('aticket'); 
Route::get('/aticket/ver/{id}','ControllerAdmin@detalleticket')->name('verticket'); 
Route::post('/aticket/ver/{id}/actualizar','ControllerAdmin@actualizarestado')->name('actualizar');
Route::get('/aticket/borrar/{id}', 'ControllerAdmin@eliminarticket')->name('borrarticket');
Route::get('/auser', 'ControllerAdmin@auser')->name('auser');
