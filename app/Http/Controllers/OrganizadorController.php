<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organizador;
use App\Models\Evento;
use Illuminate\Support\Str;

class OrganizadorController extends Controller
{
    public function formularioOrganizador()
    {
        $eventos = Evento::all();
        return view('organizador', compact('eventos'));
    }

    public function guardarOrganizador(Request $request, $eventoId)
    {
        
        $organizador = new Organizador;
        $oeganizador->EVENTO_ID = $eventoId;
        $organizador->ORGANIZADOR_NOMBRE = $request->input('ORGANIZADOR_NOMBRE');
        $organizador->ORGANIZADOR_ENLACE = $request->input('ORGANIZADOR_ENLACE');

        if ($request->hasFile('ORGANIZADOR_LOGO')) {
            $logoFile = $request->file('ORGANIZADOR_LOGO');
            $nombreLogo = Str::slug($organizador->ORGANIZADOR_NOMBRE) . '-logo.' . $logoFile->getClientOriginalExtension();
            $rutaLogo = $logoFile->storeAs('logosOrganizador', $nombreLogo, 'local');
            $organizador->ORGANIZADOR_LOGO = $rutaLogo;
        }

        $organizador->save();

        return redirect()->route('organizador')->with('success', 'Organizador guardado correctamente.');
    }
}
