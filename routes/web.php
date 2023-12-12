<?php

use App\Http\Controllers\ContactoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\OrganizadorController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\MainController;

use App\Http\Controllers\AsignarController;
use App\Http\Controllers\RegformController;
use App\Http\Controllers\formularioGeneradoController;
use App\Http\Controllers\MailController;


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

Route::get('/formulario', [EventoController::class , 'formulario'])->name('formulario');

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

//Route::get('/welcome', [MainController::class, 'index'])->name('welcome');

Route::post('/actualizar-evento/{evento}',[EventoController::class, 'actualizar'])->name('actualizarEvento');

Route::get('/formulario-registro/{eventoId}', [RegformController::class, 'mostrarFormulario'])->name('mostrarFormularioRegistro');
Route::post('/guardar-formulario/{eventoId}', [RegformController::class, 'guardarFormulario'])->name('guardarFormulario');  

Route::get('/formulario-generado', [formularioGeneradoController::class, 'mostrarFormularioGenerado'])->name('formularioRegistro');
Route::post('/procesar-formulario-generado', 'RegformController@procesarFormularioGenerado')->name('procesarFormularioGenerado');
Route::post('/editar-formulario/{eventoId}', 'RegformController@editarFormulario')->name('editarFormulario');

Route::put('/actualizar-formulario/{regformId}', [RegformController::class, 'actualizarFormulario'])->name('actualizarFormulario');
Route::get('/formulario-edicion/{eventoId}/{regformId}', [RegformController::class, 'mostrarFormularioEdicion'])->name('mostrarFormularioEdicion');
Route::put('/actualizar-formulario/{regformId}', [RegformController::class, 'actualizarFormulario'])->name('actualizarFormulario');

Route::get('/mostrar-formulario', [MailController::class, 'mostrarFormulario']);
Route::post('/enviar-correo', [MailController::class, 'enviarCorreoPersonalizado']);
 
Route::get('/asigOrganizador', [OrganizadorController::class, 'asignar']) -> name('asigOrganizador');
Route::post('/guardarOrga', [OrganizadorController::class, 'guardarOrga'])->name('guardarOrga');
Route::get('/seleccionar-evento',[EventoController::class, 'vistaSeleccionarEvento'])->name('seleccionarEvento');
Route::get('/seleccionar-evento', 'EventoController@vistaSeleccionarEvento')->name('seleccionarEvento');
Route::post('/editarEvento', 'EventoController@editarEvento')->name('editarEvento');

Route::post('/editarEvento',[EventoController::class, 'editarEvento'])->name('editarEvento');

Route::get('/checkEdit/{eventoId}',[EventoController::class,'editarNew'])->name('checkEdit');

Route::get('/checkAfiche/{eventoId}',[EventoController::class,'editarAfiche'])->name('checheAfiche');

Route::get('/checkContacto/{eventoId}',[EventoController::class,'editarContacto'])->name('checkContacto');


Route::post('/updateAfiche',[EventoController::class, 'updateAfiche'])->name('updateAfiche');
Route::post('/updateContacto',[EventoController::class, 'updateContacto'])->name('updateContacto');

//Route::get('/checkbox',[EventoController::class,''])
Route::get('/asigPatrocinador', [SponsorController::class, 'asignar']) -> name('asigPatrocinador');
Route::post('/guardarOrga', [SponsorController::class, 'guardarPatro'])->name('guardarPatro');

Route::get('/frecuencia', function () { return view('frecuencia');}) ->name('frecuencia');
Route::get('/barra', function () { return view('barra');}) ->name('barra');
