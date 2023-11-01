<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () { return view('welcome');}) ->name('welcome');

Route::get('/evento', function () {return view('evento');})->name('evento');

Route::get('/formulario', 'App\Http\Controllers\EventoController@formulario')->name('formulario');
Route::post('/guardar-evento', 'App\Http\Controllers\EventoController@guardarEvento')->name('guardarEvento');