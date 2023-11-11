<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsor;
use App\Models\Evento;

class SponsorController extends Controller
{
    public function mostrarFormulario()
    {
        $eventos = Evento::all();
        return view('sponsor', compact('eventos'));
    }

    public function guardarSponsor(Request $request)
    {
        // $request->validate([
        //     'SPONSOR_NOMBRE' => 'required',
        //     'SPONSOR_ENLACE' => 'nullable|url',
        //     'SPONSOR_LOGO' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);

        
        $sponsor = new Sponsor;
        $sponsor->SPONSOR_NOMBRE = $request->input('SPONSOR_NOMBRE');
        $sponsor->SPONSOR_ENLACE = $request->input('SPONSOR_ENLACE');
        $sponsor->SPONSOR_LOGO = null;
        $sponsor->save();

        return redirect()->route('sponsor')->with('success', 'Sponsor guardado correctamente.');
    }
}
