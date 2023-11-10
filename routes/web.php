<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ImagenController;


Route::get('/imagen', [ImagenController::class, 'mostrarFormulario']) -> name('imagen');

Route::post('/guardarImagen', [ImagenController::class, 'guardarImagen'])->name('guardarImagen');


Route::get('/', function () { return view('welcome');}) ->name('welcome');

Route::get('/evento', function () {return view('evento');})->name('evento');

Route::get('/misEventos', [EventoController::class, 'misEventos'])->name('misEventos');

Route::get('/formulario', 'App\Http\Controllers\EventoController@formulario')->name('formulario');

Route::post('/guardar-evento', 'App\Http\Controllers\EventoController@guardarEvento')->name('guardarEvento');

Route::get('/', function () { return view('home');}) ->name('home');

Route::get('/vista', function () { return view('vista');}) ->name('vista');

