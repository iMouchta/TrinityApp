<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;


Route::get('/', function () { return view('welcome');}) ->name('welcome');

Route::get('/evento', function () {return view('evento');})->name('evento');


Route::get('/misEventos', [EventoController::class, 'misEventos'])->name('misEventos');

Route::get('/afiche', function () {return view('afiche');})->name('afiche');

Route::get('/formulario', 'App\Http\Controllers\EventoController@formulario')->name('formulario');
Route::post('/guardar-evento', 'App\Http\Controllers\EventoController@guardarEvento')->name('guardarEvento');   