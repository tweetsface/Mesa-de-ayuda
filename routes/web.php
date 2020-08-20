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
Route::get('/login/logout','MainController@logout')->name('salir');
Route::get('/registrar','MainController@registrar');
Route::post('/registrar','MainController@registrarusuario')->name('registrar');
Route::get('/login/recuperar','MainController@recuperar')->name('recuperar');
Route::post('/login/recuperar','MainController@forgotpassword');
Route::get('/dashboard','MainController@dashboard')->name('dashboard')
->middleware('verified')->middleware('admin');
Route::get('/panel','MainController@panel')->name('panel')->middleware('local')
->middleware('verified');
Route::post('/panel','MainController@generarreporte')->name('tickets');
Route::post('/panel','MainController@generarreporte')->name('ticket');
Route::get('/ticket/view/{id}','MainController@verTicketu')->name('verTicketu')->middleware('local');
Route::post('/ticket/view/{id}/agregar','MainController@comentarios')->name('addcomen');
Route::get('/aticket','ControllerAdmin@ticket')->name('aticket')->middleware('admin'); 
Route::get('/aticket/entre','ControllerAdmin@buscarEntre')->name('buscarE')->middleware('admin');
Route::get('/aticket/buscar','ControllerAdmin@buscarTickets')->name('buscart')->middleware('admin');
Route::get('/aticket/ver/{id}','ControllerAdmin@detalleticket')->name('verticket')->middleware('admin'); 
Route::post('/aticket/ver/{id}/actualizar','ControllerAdmin@actualizarestado')
->name('actualizar')->middleware('admin');
Route::post('/aticket/ver/{id}/actualizar/comentario','ControllerAdmin@resTicket')
->name('resTicket')->middleware('admin');
Route::get('/aticket/borrar/{id}', 'ControllerAdmin@eliminarticket')->name('borrarticket');
Route::get('/auser', 'ControllerAdmin@auser')->name('auser')->middleware('admin');
Route::get('/auser/{id}/buscar', 'ControllerAdmin@infoauser')->name('infoauser');
Route::get('/auser/buscar', 'ControllerAdmin@scopeUsuario')->name('buscarUsuario')->middleware('admin');
Route::post('/auser', 'MainController@registrarusuario')->name('registrarU');//Se reutilizo el metodo
Route::post('/auser/{id}/actualizar', 'ControllerAdmin@actualizaUsuarios')->name('ausuarios');
Route::get('/reportes', 'ControllerAdmin@gReportes')->name('gReportes');
Route::get('/reportesX', 'ControllerAdmin@cReportes');
Route::get('/correo', 'ControllerAdmin@correo');
Route::get('/export-users','ExcelController@reportes')->name('reporteExcel');
Auth::routes(['verify'=>true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/userManual','MainController@downloadManual');
