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
Route::post('/registrar','MainController@registrarusuario');
Route::get('/login/recuperar','MainController@recuperar')->name('recuperar');
Route::post('/login/recuperar','MainController@forgotpassword');
Route::get('/dashboard','MainController@dashboard')->name('dashboard')
->middleware('verified')->middleware('auth');
Route::get('/panel','MainController@panel')->name('panel')
->middleware('verified')->middleware('auth');
Route::post('/panel','MainController@generarreporte')->name('tickets');
Route::post('/panel','MainController@generarreporte')->name('ticket');
Route::get('/ticket/view/{id}','MainController@verTicketu')->name('verTicketu');
Route::post('/ticket/view/{id}/agregar','MainController@comentarios')->name('addcomen');
Route::get('/aticket','ControllerAdmin@ticket')->name('aticket'); 
Route::get('/aticket/entre','ControllerAdmin@buscarEntre')->name('buscarE');
Route::get('/aticket/buscar','ControllerAdmin@buscarTickets')->name('buscart');
Route::get('/aticket/ver/{id}','ControllerAdmin@detalleticket')->name('verticket'); 
Route::post('/aticket/ver/{id}/actualizar','ControllerAdmin@actualizarestado')
->name('actualizar');
Route::post('/aticket/ver/{id}/actualizar/comentario','ControllerAdmin@resTicket')
->name('resTicket');
Route::get('/aticket/borrar/{id}', 'ControllerAdmin@eliminarticket')->name('borrarticket');
Route::get('/auser', 'ControllerAdmin@auser')->name('auser');
Route::get('/auser/buscar', 'ControllerAdmin@scopeUsuario')->name('buscarUsuario');
Route::post('/auser', 'MainController@registrarusuario')->name('registrarU');//Se reutilizo el metodo
Route::get('/auser/{id}/actualizar', 'ControllerAdmin@actualizaUsuarios')->name('ausuarios');
Route::get('/reportes', 'ControllerAdmin@gReportes')->name('gReportes');
Route::post('/reportes', 'ControllerAdmin@cReportes');
Route::get('/export-users', 'ExcelController@incidencias');
Route::get('/correo', 'ControllerAdmin@correo');
Route::get('/export-users', 'ExcelController@incidencias');
Auth::routes(['verify'=>true]);
Route::get('/home', 'HomeController@index')->name('home');
