<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Regform;

class formularioGeneradoController extends Controller
{
    public function mostrarFormularioGenerado($eventoId)
    {
        $evento = Evento::findOrFail($eventoId);
        $formularios = Regform::where('EVENTO_ID', $eventoId)->get();

        return view('formGenerado', ['evento' => $evento, 'formularios' => $formularios]);
    }
}
