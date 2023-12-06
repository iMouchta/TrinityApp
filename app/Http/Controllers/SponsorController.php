<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsor;
use App\Models\Evento;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class SponsorController extends Controller
{
    public function mostrarFormulario()
    {
        $eventos = Evento::all();
        return view('sponsor', compact('eventos'));
    }

    public function guardarSponsor(Request $request, $eventoId)
    {

        $sponsor = new Sponsor;
        $sponsor->EVENTO_ID = $eventoId;
        $sponsor->SPONSOR_NOMBRE = $request->input('SPONSOR_NOMBRE');
        $sponsor->SPONSOR_ENLACE = $request->input('SPONSOR_ENLACE');

        if ($request->hasFile('SPONSOR_LOGO')) {
            $logoFile = $request->file('SPONSOR_LOGO');
            $nombreLogo = Str::slug($sponsor->SPONSOR_NOMBRE) . '-logo.' . $logoFile->getClientOriginalExtension();
            $rutaLogo = $logoFile->storeAs('logosSponsor', $nombreLogo, 'local');
            $sponsor->SPONSOR_LOGO = $rutaLogo;
        }

        $sponsor->save();

        return redirect()->route('sponsor')->with('success', 'Sponsor guardado correctamente.');
    }

    public function asignar()
    {
        $eventos = Evento::all();
        $sponsors = Sponsor::all();
        return view('asigSponsor', compact('eventos', 'sponsores'));
    }

    public function guardarAsignacion(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'evento_id' => 'required|exists:eventos,EVENTO_ID',
            'sponsor_id' => 'required|exists:sponsores,SPONSOR_ID',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $evento = Evento::find($request->input('evento_id'));
        $evento->sponsores()->attach($request->input('sponsor_id'));

        return redirect()->route('asignar')->with('success', 'Sponsor asignado al evento correctamente.');
    }
}
