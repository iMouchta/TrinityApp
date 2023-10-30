<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Fecha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventoController extends Controller
{
    public function guardarEvento(Request $request)
    {
        // Valida y guarda los datos del evento
        $evento = new Evento;
        $evento->EVENTO_NOMBRE = $request->input('name');
        $evento->EVENTO_TIPO = $request->input('EVENTO_TIPO');
        if ($request->has('EVENTO_COSTO')) {
            $evento->EVENTO_COSTO = $request->input('EVENTO_COSTO');
        }else{
            $evento->EVENTO_COSTO = 0;
        }
        $evento->save();

        // Guarda los datos de la calendarización asociada al evento
        if ($request->has('fechas.FECHA_NOMBRE') && $request->has('fechas.FECHA_FECHA')) {
            foreach ($request->input('fechas.FECHA_NOMBRE') as $key => $nombreFecha) {
                $fecha = new Fecha;
                $fecha->FECHA_NOMBRE = $nombreFecha;
                $fecha->FECHA_FECHA = $request->input('fechas.FECHA_FECHA')[$key];
                $fecha->EVENTO_ID = $evento->id; // Asociar con el evento
                $fecha->save();
            }
        }

        // Completa la transacción de base de datos
        DB::commit();

        return redirect()->route('formulario')->with('success', 'Evento y calendarización guardados correctamente.');
    }
}
