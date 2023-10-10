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

Route::get('/registro', function () {
    return view('registro');
})->name('registro');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/anuncios', function () {
    return view('anuncios');
})->name('anuncios');

Route::get('/patrocinadores', function () {
    return view('patrocinadores');
})->name('patrocinadores');