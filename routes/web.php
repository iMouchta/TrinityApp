<?php

use App\Http\Controllers\ContactoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\OrganizadorController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\MainController;

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

Route::post('/guardarEvento', 'App\Http\Controllers\EventoController@guardarEvento')->name('guardarEvento');

Route::get('/buscar', [EventoController::class,'buscar'])->name('buscar');

//Route::get('/welcome', [MainController::class, 'index'])->name('welcome');