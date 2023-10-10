<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        $datos = Evento::all();
        return view('welcome', compact('datos'));
    }


    public function create()
    {
        return view('agregarEvento');
    }

    public function store(Request $request)
    {
        //
    }


    public function show(Evento $evento)
    {
        //
    }

 
    public function edit(Evento $evento)
    {
        //
    }


    public function update(Request $request, Evento $evento)
    {
        //
    }

 
    public function destroy(Evento $evento)
    {
        //
    }
}
