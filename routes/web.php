<?php

use App\Http\Controllers\ContactoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\OrganizadorController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RegformController;
use App\Http\Controllers\formularioGeneradoController;
use App\Http\Controllers\MailController;

Route::get('/eventos/{evento}', [EventoController::class, 'verEvento'])->name('ver.evento');

Route::get('/imagen', [ImagenController::class, 'mostrarFormulario'])->name('imagen');

Route::post('/guardarImagen', [ImagenController::class, 'guardarImagen'])->name('guardarImagen');

Route::get('/sponsor', [SponsorController::class, 'mostrarFormulario'])->name('sponsor');

Route::post('/guardarSponsor', [SponsorController::class, 'guardarSponsor'])->name('guardarSponsor');

Route::get('/organizador', [OrganizadorController::class, 'formularioOrganizador'])->name('organizador');

Route::post('/guardarOrganizador', [OrganizadorController::class, 'guardarOrganizador'])->name('guardarOrganizador');

Route::get('/contacto', [ContactoController::class, 'formularioContacto'])->name('contacto');

Route::post('/guardarContacto', [ContactoController::class, 'guardarContacto'])->name('guardarContacto');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/evento', function () {
    return view('evento');
})->name('evento');

Route::get('/misEventos', [EventoController::class, 'misEventos'])->name('misEventos');

Route::get('/formulario', 'App\Http\Controllers\EventoController@formulario')->name('formulario');

Route::post('/guardarEvento', [EventoController::class, 'guardarEvento'])->name('guardarEvento');

Route::get('/buscar', [EventoController::class, 'buscar'])->name('buscar');

//Route::get('/welcome', [MainController::class, 'index'])->name('welcome');

Route::get('/formulario-registro/{eventoId}', [RegformController::class, 'mostrarFormulario'])->name('mostrarFormularioRegistro');
Route::post('/guardar-formulario/{eventoId}', [RegformController::class, 'guardarFormulario'])->name('guardarFormulario');

Route::get('/formulario-generado/{eventoId}', [formularioGeneradoController::class, 'mostrarFormularioGenerado'])->name('formulario-generado');
Route::post('/procesar-formulario-generado', 'RegformController@procesarFormularioGenerado')->name('procesarFormularioGenerado');
Route::post('/editar-formulario/{eventoId}', 'RegformController@editarFormulario')->name('editarFormulario');

Route::put('/actualizar-formulario/{regformId}', [RegformController::class, 'actualizarFormulario'])->name('actualizarFormulario');
Route::get('/formulario-edicion/{eventoId}/{regformId}', [RegformController::class, 'mostrarFormularioEdicion'])->name('mostrarFormularioEdicion');
Route::put('/actualizar-formulario/{regformId}', [RegformController::class, 'actualizarFormulario'])->name('actualizarFormulario');

Route::get('/mostrar-formulario/{eventoId}', [RegformController::class, 'mostrarFormulario'])->name('mostrarFormulario');


Route::get('/mostrar-formulario-correo', [MailController::class, 'mostrarFormularioCorreo'])->name('mostrarFormularioCorreo');
Route::post('/enviar-correo', [MailController::class, 'enviarCorreoPersonalizado']);

Route::get('/asigOrganizador/{eventoId}', [OrganizadorController::class, 'asignar'])->name('asigOrganizador');
Route::post('/guardarOrga/{eventoId}', [OrganizadorController::class, 'guardarOrga'])->name('guardarOrga');

Route::get('/seleccionar-evento', 'EventoController@vistaSeleccionarEvento')->name('seleccionarEvento');
Route::get('/editarEvento/{eventoId}', [EventoController::class, 'editar'])->name('editarEvento');

Route::get('/asigPatrocinador/{eventoId}', [SponsorController::class, 'asignar'])->name('asigPatrocinador');
Route::post('/guardarPatro/{eventoId}', [SponsorController::class, 'guardarPatro'])->name('guardarPatro');


Route::post('/mostrar-detalle-evento', [EventoController::class, 'mostrarDetalleEvento'])->name('mostrarDetalleEvento');
Route::put('/actualizar-evento/{eventoId}', [EventoController::class, 'actualizarEvento'])->name('actualizarEvento');