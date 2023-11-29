<?php

use App\Http\Controllers\ContactoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\OrganizadorController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AsignarController;

Route::get('/eventos/{evento}', [EventoController::class, 'verEvento']) -> name('ver.evento');

Route::get('/imagen', [ImagenController::class, 'mostrarFormulario']) -> name('imagen');

Route::post('/guardarImagen', [ImagenController::class, 'guardarImagen'])->name('guardarImagen');

Route::get('/sponsor', [SponsorController::class, 'mostrarFormulario']) -> name('sponsor');

Route::post('/guardarSponsor', [SponsorController::class, 'guardarSponsor'])->name('guardarSponsor');

Route::get('/organizador', [OrganizadorController::class, 'formularioOrganizador']) -> name('organizador');

Route::post('/guardarOrganizador', [OrganizadorController::class, 'guardarOrganizador'])->name('guardarOrganizador');

Route::get('/contacto', [ContactoController::class, 'formularioContacto']) -> name('contacto');

Route::post('/guardarContacto', [ContactoController::class, 'guardarContacto'])->name('guardarContacto');

Route::get('/', function () { return view('welcome');}) ->name('welcome');

Route::get('/evento', function () {return view('evento');})->name('evento');

Route::get('/misEventos', [EventoController::class, 'misEventos'])->name('misEventos');

Route::get('/formulario', 'App\Http\Controllers\EventoController@formulario')->name('formulario');

Route::post('/guardarEvento', [EventoController::class, 'guardarEvento'])->name('guardarEvento');

Route::get('/buscar', [EventoController::class,'buscar'])->name('buscar');

Route::get('/evento-edit/{id}', [EventoController::class, 'edit']) -> name('edit.evento');

Route::post('/update-evento',[EventoController::class, 'update'])->name('update.evento'); 


Route::get('/asignar/{id}', [AsignarController::class, 'asignarToEvent'])->name('asignar.evento');

Route::post('/guardar-asignacio',[AsignarController::class, 'guardarAsignacion'])->name('save.asginar');

Route::get('/elimiar-evento/{id}',[EventoController::class, 'eliminar'])->name('eliminar.evento');


Route::get('/registra-usu/{id}',[EventoController::class, 'asignarUser'])->name('register.user.evento');

// //Route::get('/welcome', [MainController::class, 'index'])->name('welcome');

Route::get('/baja', function () {return view('baja');})->name('baja');
Route::get('/usuario', function () {return view('usuario');})->name('usuario');