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
        $formulario = Regform::where('EVENTO_ID', $eventoId)->first();

        if ($formulario) {
            return view('editarFormulario', ['evento' => $evento, 'formulario' => [$formulario]]);
        } else {
            return view('formularioRegistro', ['evento' => $evento]);
        }
    }

    public function guardarFormulario(Request $request, $eventoId)
    {
        $request->validate([
            'nombre.*' => 'required|string',
            'tipo.*' => 'required|in:text,email,number,url,text,image',
            'configuracion.*' => 'required|in:obligatorio,opcional',
        ]);

        // Eliminar formularios existentes
        Regform::where('EVENTO_ID', $eventoId)->delete();

        // Insertar nuevos formularios
        foreach ($request->input('nombre') as $index => $nombre) {
            $regform = new Regform;
            $regform->REGFORM_NOMBRE = $nombre;
            $regform->REGFORM_TIPO = $request->input("tipo.$index");
            $regform->REGFORM_CONFIGURACION = $request->input("configuracion.$index");
            $regform->EVENTO_ID = $eventoId;
            $regform->save();
        }

        return redirect()->route('misEventos')->with('success', 'Formulario de registro guardado correctamente.');
    }

    public function mostrarFormularioEdicion($eventoId, $regformId)
    {
        // Obtener datos del evento y del formulario a editar
        $evento = Evento::find($eventoId);
        $regform = Regform::find($regformId);

        // Otras lógicas necesarias

        // Pasar los datos a la vista
        return view('editarFormulario', compact('evento', 'regform'));
    }

    public function actualizarFormulario(Request $request, $regformId)
    {
        $request->validate([
            'nombre.*' => 'required|string',
            'tipo.*' => 'required|in:text,email,number,url,text,image',
            'configuracion.*' => 'required|in:obligatorio,opcional',
        ]);

        // Obtener el formulario existente por ID
        $regform = Regform::findOrFail($regformId);

        // Eliminar formularios existentes
        Regform::where('EVENTO_ID', $regform->EVENTO_ID)->delete();

        // Insertar nuevos formularios
        foreach ($request->input('nombre') as $index => $nombre) {
            $regform = new Regform;
            $regform->REGFORM_NOMBRE = $nombre;
            $regform->REGFORM_TIPO = $request->input("tipo.$index");
            $regform->REGFORM_CONFIGURACION = $request->input("configuracion.$index");
            $regform->EVENTO_ID = $regform->EVENTO_ID;
            $regform->save();
        }

        return redirect()->route('misEventos')->with('success', 'Formulario de registro actualizado correctamente.');
    }
}
