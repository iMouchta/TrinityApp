<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');});

Route::get('/home', function () {return view('home');})->name('home');

Route::get('/evento', function () {return view('evento');})->name('evento');

Route::get('/anuncios', function () {return view('anuncios');})->name('anuncios');

Route::get('/patrocinador', function () {return view('patrocinador');})->name('patrocinador');

Route::get('/misEventos', function () {return view('misEventos');})->name('misEventos');

// Route::post('/patrocinador', 'FileUploadController@store')->name('upload');
// Route::post('/evento', 'FileUploadController@store')->name('uploads');

Route::get('/formulario', 'App\Http\Controllers\EventoController@formulario')->name('formulario');
Route::post('/guardar-evento', 'App\Http\Controllers\EventoController@guardarEvento')->name('guardarEvento');