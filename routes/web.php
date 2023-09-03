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

// autenticacion
Auth::routes();
// inicio
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// articulos
Route::get('/crearArticulo',[App\Http\Controllers\ArticuloController::class, 'create'])->name('crearArticulo');
Route::post('/crearArticulo','App\Http\Controllers\ArticuloController@store')->name('crearArticulo.store');
Route::get('/listaArticulo',[App\Http\Controllers\ArticuloController::class, 'index'])->name('listaArticulos');
Route::get('/articulo/{articulo}','App\Http\Controllers\ArticuloController@show')->name('articulo');
Route::patch('/articulo/editar/{articulo}','App\Http\Controllers\ArticuloController@update')->name('editarArticulo.update');
Route::delete('/articulo/{articulo}','App\Http\Controllers\ArticuloController@destroy')->name('articulo.destroy');
// usuarios
Route::get('/crearUsuario',[App\Http\Controllers\UserController::class, 'create'])->name('crearUsuario');
Route::post('/crearUsuario','App\Http\Controllers\UserController@store')->name('crearUsuario.store');
Route::get('/listaUsuarios',[App\Http\Controllers\UserController::class, 'index'])->name('listaUsuarios');
Route::get('/usuario/{user}','App\Http\Controllers\UserController@show')->name('usuario');
Route::patch('/usuario/editar/{user}','App\Http\Controllers\UserController@update')->name('editarUsuario.update');
Route::delete('/usuario/{user}','App\Http\Controllers\UserController@destroy')->name('user.destroy');
// departamento
Route::post('/crearDepartamento','App\Http\Controllers\DepartamentoController@store')->name('crearDepartamento.store');
Route::get('/listaDepartamentos',[App\Http\Controllers\DepartamentoController::class, 'index'])->name('listaDepartamentos');
Route::get('/departamento/activar/{departamento}','App\Http\Controllers\DepartamentoController@activar')->name('editarDepartamento.activar');
Route::get('/departamento/desactivar/{departamento}','App\Http\Controllers\DepartamentoController@desactivar')->name('editarDepartamento.desActivar');
// CC
Route::post('/crearCc','App\Http\Controllers\CcController@store')->name('crearCc.store');
Route::get('/listaCcs',[App\Http\Controllers\CcController::class, 'index'])->name('listaCcs');
Route::get('/cc/activar/{cc}','App\Http\Controllers\CCController@activar')->name('editarCc.activar');
Route::get('/cc/desactivar/{cc}','App\Http\Controllers\CcController@desactivar')->name('editarCc.desActivar');
//Estaciones
Route::post('/crearEstacion','App\Http\Controllers\EstacionController@store')->name('crearEstacion.store');
Route::get('/listaEstaciones',[App\Http\Controllers\EstacionController::class, 'index'])->name('listaEstaciones');
Route::get('/estacion/activar/{estacion}','App\Http\Controllers\EstacionController@activar')->name('editarEstacion.activar');
Route::get('/estacion/desactivar/{estacion}','App\Http\Controllers\EstacionController@desactivar')->name('editarEstacion.desActivar');
// asignacion de articulos
Route::get('/listaAsignacion',[App\Http\Controllers\AsignacionArticulosController::class, 'index'])->name('listaAsignacion');
Route::get('/vistaAsignacion/{estacion}/{cc}/{tipo}',[App\Http\Controllers\AsignacionArticulosController::class, 'show'])->name('vistaAsignacion');
Route::post('/guardarArticulos',[App\Http\Controllers\AsignacionArticulosController::class, 'store'])->name('guardarArticulos');

// solicitudes
Route::get('/crearSolicitud',[App\Http\Controllers\SolicitudController::class, 'index'])->name('crearSolicitud');
Route::post('/solicitud',[App\Http\Controllers\SolicitudController::class, 'nuevaSolicitud'])->name('solicitud');
Route::post('/tablaSolicitud',[App\Http\Controllers\SolicitudController::class, 'tablaSolicitud'])->name('tablaSolicitud');
Route::get('/listaSolicitudes',[App\Http\Controllers\SolicitudController::class, 'show'])->name('listaSolicitudes');
Route::post('/agregarCarrito',[App\Http\Controllers\ElementosSolicitudController::class, 'store'])->name('agregarCarrito');
Route::get('/eliminarElementoSolicitud',[App\Http\Controllers\SolicitudController::class, 'eliminarElementoSolicitud'])->name('eliminarElementoSolicitud');

// aprobaciones
Route::post('/solicitarAprobacion',[App\Http\Controllers\AprobacionController::class, 'index'])->name('solicitarAprobacion');

Route::POST('/aprobacion',[App\Http\Controllers\AprobacionController::class, 'aprobaciones'])->name('aprobaciones');


// entregas
Route::get('/entregaPendiente',[App\Http\Controllers\HomeController::class, 'entregaPendiente'])->name('entregaPendiente');
Route::get('/entregaPendienteDetalles',[App\Http\Controllers\HomeController::class, 'entregaPendienteDetalles'])->name('entregaPendienteDetalles');
// conciliacion
Route::get('/conciliacion',[App\Http\Controllers\HomeController::class, 'conciliacion'])->name('conciliacion');
// configuracion
Route::get('/configurar',[App\Http\Controllers\HomeController::class, 'configurar'])->name('configurar');


