<?php

use App\Http\Controllers\EventoController;
use Illuminate\Support\Facades\Route;

Route::get('/',[EventoController::class, 'index']) -> name('Evento.index');
Route::get('/create',[EventoController::class, 'create'])-> name('Evento.create');
Route::get('/edit',[EventoController::class, 'edit'])-> name('Evento.edit');
