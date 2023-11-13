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
            $evento->EVENTO_BASES = $request->input('EVENTO_BASE');
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
                    $fecha->FECHA_DESCRIPCION = $request->input('fechas.FECHA_DESCRIPCION')[$key];
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

                      return redirect()->route('evento')->withInput()->with('success', 'Evento y calendarización guardados correctamente.');
        } catch (ValidationException $e) {
            return redirect()->route('evento')->withErrors($e->validator->errors());
        }
    }

    public function misEventos()
    {
        $eventos = Evento::all();

        foreach ($eventos as $evento) {
            $evento->fechas = $this->obtenerFechas($evento->EVENTO_ID); // Asumiendo que el ID del evento es 'id'
            
        }
        return view('misEventos')->with('eventos', $eventos);
    }


    
    public function eventoDetalle()
    {
        $eventos = Evento::all(); // Obtiene todos los eventos
    
        // Itera sobre cada evento para obtener las fechas asociadas a cada uno
        foreach ($eventos as $evento) {
            $evento->fechas = $this->obtenerFechas($evento->EVENTO_ID); // Asumiendo que el ID del evento es 'id'
            $evento->requisitos = $this->obtenerRequisitos($evento->EVENTO_ID); 
        }
    
        return view('eventoDetalle', ['eventos' => $eventos]);
    }
    
    public function obtenerFechas($idEvento)
    {   
        $fechas = Fecha::where('EVENTO_ID', $idEvento)->get();
        return $fechas;
    }
    public function obtenerRequisitos($idEvento)
    {   
        $requisitos = Requisito::where('EVENTO_ID', $idEvento)->get();
        return $requisitos;
    }


    public function unEventoDetalle($idEvento)
{
    $evento = Evento::find($idEvento);
    
    $fechas = Fecha::where('EVENTO_ID', $idEvento)->get();
    $requisitos = Requisito::where('EVENTO_ID', $idEvento)->get();

    return view('unEventoDetalle', compact('evento', 'fechas', 'requisitos'));
}
 }
