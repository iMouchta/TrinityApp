<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsor;
use App\Models\Evento;
use Illuminate\Support\Str;

class SponsorController extends Controller
{
    public function mostrarFormulario()
    {
        $eventos = Evento::all();
        return view('sponsor', compact('eventos'));
    }

    public function guardarSponsor(Request $request)
    {
        
        $sponsor = new Sponsor;
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
}
