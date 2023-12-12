<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Regform;

class RegformController extends Controller
{
    public function mostrarFormulario($eventoId)
    {
        $evento = Evento::findOrFail($eventoId);
        $formularios = Regform::where('EVENTO_ID', $eventoId)->get();

        return view('formularioRegistro', ['evento' => $evento, 'formularios' => $formularios]);
    }

    public function guardarFormulario(Request $request, $eventoId)
    {
        // Validaciones, si es necesario
        $request->validate([
            // Agrega aquí las reglas de validación si es necesario
        ]);

        // Obtener datos del formulario
        $nombres = $request->input('nombre');
        $tipos = $request->input('tipo');
        $configuraciones = $request->input('configuracion');

        // Verificar si hay datos antes de iterar
        if (is_array($nombres)) {
            // Procesar los datos
            foreach ($nombres as $key => $nombre) {
                $regform = new Regform([
                    'REGFORM_NOMBRE' => $nombre,
                    'REGFORM_TIPO' => $tipos[$key] ?? null,
                    'REGFORM_CONFIGURACION' => $configuraciones[$key] ?? null,
                    'EVENTO_ID' => $eventoId,
                ]);

                $regform->save();
            }
        }

        // Puedes redirigir a alguna vista o hacer lo que necesites
        return redirect()->route('mostrarFormulario', ['eventoId' => $eventoId])->with('success', 'Formulario guardado correctamente');
    }
}
