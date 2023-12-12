<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;
use App\Models\Evento;
use App\Models\Organizador;
use App\Models\Sponsor;
use App\Models\Patrocinio;
use App\Models\Organizan;


class AsignarController extends Controller
{
    public function formularioContacto()
    {
        $eventos = Evento::all();
        return view('contacto', compact('eventos'));
    }


    public function asignarToEvent($id){ 
        $evento = Evento::where('EVENTO_ID',$id)->first();
        
        $organizador =  Organizador::all();
        $patornacidor =  Sponsor::all();

        return view('event.event-asignar',compact('evento','patornacidor','organizador'));
    }

    public function guardarAsignacion(Request $request)
    {
      


        $evento = Evento::where('EVENTO_ID', $request->EVENTO_ID)->first();
       
        $exist =  Patrocinio::where('EVENTO_ID',$request->EVENTO_ID)->where('SPONSOR_ID',$request->SPONSOR_ID)->first();

        if($request->EVENTO_ID != null &&  $request->SPONSOR_ID != null ){
            if($exist == null){
            $patrocionio =  new Patrocinio;
            $patrocionio->EVENTO_ID =$request->EVENTO_ID;
            $patrocionio->SPONSOR_ID =  $request->SPONSOR_ID;
            $patrocionio->save();
            } 
        }

        $exitOrganization =  Organizan::where('EVENTO_ID',$request->EVENTO_ID)->where('ORGANIZADOR_ID',$request->ORGANIZADOR_ID)->first();
        if($request->EVENTO_ID != null &&  $request->ORGANIZADOR_ID != null){ 
            if($exitOrganization == null){  
                $organizan  =  new Organizan;
                $organizan->ORGANIZADOR_ID =$request->ORGANIZADOR_ID;
                $organizan->EVENTO_ID  =  $request->EVENTO_ID;
                $organizan->save();
            }
       }


        return redirect()->route('misEventos')->with('success', 'Contacto guardado correctamente.');
    }
}
