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

// Route::get('/', function () {
//     return 'Holis aqui estoy';
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/solicitar',[App\Http\Controllers\HomeController::class, 'solicitar'])->name('solicitar');
Route::get('/solicitud',[App\Http\Controllers\HomeController::class, 'solicitud'])->name('solicitud');
Route::get('/listaSolicitudes',[App\Http\Controllers\HomeController::class, 'listaSolicitudes'])->name('listaSolicitudes');
Route::get('/aprobaciones',[App\Http\Controllers\HomeController::class, 'aprobaciones'])->name('aprobaciones');
Route::get('/entregaPendiente',[App\Http\Controllers\HomeController::class, 'entregaPendiente'])->name('entregaPendiente');
Route::get('/entregaPendienteDetalles',[App\Http\Controllers\HomeController::class, 'entregaPendienteDetalles'])->name('entregaPendienteDetalles');
Route::get('/conciliacion',[App\Http\Controllers\HomeController::class, 'conciliacion'])->name('conciliacion');





Route::get('/configurar',)->name('configurar');
Route::get('/visualizar',)->name('visualizar');

Route::get('/base',[App\Http\Controllers\HomeController::class, 'base'])->name('base');


