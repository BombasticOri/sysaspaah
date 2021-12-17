<?php

use App\Http\Controllers\PersonaController;
use App\Http\Controllers\SocioController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\EventoController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function () {

    Route::get('personas/excel', [PersonaController::class, 'excel'])->name('personas.excel');
    Route::get('personas/pdf', [PersonaController::class, 'pdf'])->name('personas.pdf');
    Route::resource('personas', PersonaController::class);

    Route::get('socios/excel', [SocioController::class, 'excel'])->name('socios.excel');
    Route::get('socios/pdf', [SocioController::class, 'pdf'])->name('socios.pdf');
    Route::get('socios/pdfCarnet/{id}', [SocioController::class, 'pdfCarnet'])->name('socios.pdfCarnet');
    Route::resource('socios', SocioController::class);

    Route::get('solicitud/excel', [SolicitudController::class, 'excel'])->name('solicitudsocios.excel');
    Route::get('solicitud/pdf', [SolicitudController::class, 'pdf'])->name('solicitudsocios.pdf');
    Route::resource('solicitudsocios', SolicitudController::class);

    Route::get('eventos/excel', [EventoController::class, 'excel'])->name('eventos.excel');
    Route::get('eventos/pdf', [EventoController::class, 'pdf'])->name('eventos.pdf');
    Route::resource('eventos', EventoController::class);

    Route::get('asistencias/excel', [AsistenciaController::class, 'excel'])->name('asistencias.excel');
    Route::get('asistencias/pdf', [AsistenciaController::class, 'pdf'])->name('asistencias.pdf');
    Route::resource('asistencia', AsistenciaController::class);
});
