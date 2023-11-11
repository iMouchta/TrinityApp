<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Fecha;
use App\Models\Requisito;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EventoController extends Controller
{
    public function guardarEvento(Request $request)
    {
        $request->validate([
            'EVENTO_NOMBRE' => 'required|unique:evento',
           
            ]);

        try {

            $evento = new Evento;
            $evento->EVENTO_NOMBRE = $request->input('EVENTO_NOMBRE');
            $evento->EVENTO_TIPO = $request->input('EVENTO_TIPO');
            $evento->EVENTO_DESCRIPCION = $request->input('EVENTO_DESCRIPCION');
            $evento->EVENTO_MODALIDAD = $request->input('EVENTO_MODALIDAD');
            $evento->EVENTO_BASES = $request->input('EVENTO_BASES');
            $evento->EVENTO_UBICACION = $request->input('EVENTO_UBICACION');
            $evento->EVENTO_NOTIFICACIONES = $request->has('EVENTO_NOTIFICACIONES') ? 1 : 0;
            $evento->EVENTO_USUARIOS = $request->has('EVENTO_USUARIOS') ? 1 : 0;
            $evento->EVENTO_COSTO = $request->input('EVENTO_COSTO') ?? 0;
            $evento->save();

            if ($request->has('fechas.FECHA_NOMBRE') && $request->has('fechas.FECHA_FECHA')) {
                foreach ($request->input('fechas.FECHA_NOMBRE') as $key => $nombreFecha) {
                    $fecha = new Fecha;
                    $fecha->FECHA_NOMBRE = $nombreFecha;
                    $fecha->FECHA_FECHA = $request->input('fechas.FECHA_FECHA')[$key];
                    $fecha->EVENTO_ID = $evento->id; 
                    $fecha->save();
                }
            }

            if($request->has('requisitos.REQUISITO_NOMBRE')){
                foreach ($request->input('requisitos.REQUISITO_NOMBRE') as $key => $nombreRequisito){
                    $requisito = new Requisito;
                    $requisito -> REQUISITO_NOMBRE = $nombreRequisito;
                    $requisito -> EVENTO_ID = $evento->id;
                    $requisito -> save();

                }

            }

                      return redirect()->route('formulario')->withInput()->with('success', 'Evento y calendarización guardados correctamente.');
        } catch (ValidationException $e) {
            return redirect()->route('formulario')->withErrors($e->validator->errors());
        }
    }

    public function misEventos()
    {
        $eventos = Evento::all();
        return view('misEventos')->with('eventos', $eventos);
    }

 }
