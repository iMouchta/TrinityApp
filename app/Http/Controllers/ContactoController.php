<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;
use App\Models\Evento;

class ContactoController extends Controller
{
    public function formularioContacto()
    {
        $eventos = Evento::all();
        return view('contacto', compact('eventos'));
    }

    public function guardarContacto(Request $request)
    {
        

        $eventoId = $request->input('evento_id');
        $contacto = new Contacto;
        $contacto->CONTACTO_NOMBRE = $request->input('CONTACTO_NOMBRE');
        $contacto->CONTACTO_NUMERO = $request->input('CONTACTO_NUMERO');
        $contacto->CONTACTO_EMAIL = $request->input('CONTACTO_EMAIL');
        $contacto->EVENTO_ID = $eventoId;
        $contacto->save();

        return redirect()->route('contacto')->with('success', 'Contacto guardado correctamente.');
    }
}
