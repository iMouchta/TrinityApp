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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/evento', function () {
    return view('evento');
})->name('evento');

Route::get('/anuncios', function () {
    return view('anuncios');
})->name('anuncios');

Route::get('/patrocinador', function () {
    return view('patrocinador');
})->name('patrocinador');