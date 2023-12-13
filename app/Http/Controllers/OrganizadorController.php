<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organizador;
use App\Models\Evento;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class OrganizadorController extends Controller
{
    public function formularioOrganizador()
    {
        $eventos = Evento::all();
        return view('organizador', compact('eventos'));
    }

    public function guardarOrganizador(Request $request)
    {
        $eventoId = $request->input('evento_id');
        $organizador = new Organizador;
        $organizador->EVENTO_ID = $eventoId;
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

    public function asignar()
    {
        $eventos = Evento::all();
        $organizadores = Organizador::all();
        return view('asigOrganizador', compact('eventos', 'organizadores'));
    }

    public function guardarAsignacion(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'evento_id' => 'required|exists:eventos,EVENTO_ID',
            'organizador_id' => 'required|exists:organizadores,ORGANIZADOR_ID',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $evento = Evento::find($request->input('evento_id'));
        $evento->organizadores()->attach($request->input('organizador_id'));

        return redirect()->route('asignar')->with('success', 'Organizador asignado al evento correctamente.');
    }
}
