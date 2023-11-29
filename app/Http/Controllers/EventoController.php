<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Evento;
use App\Models\Fecha;
use App\Models\Requisito;
use App\Models\Organizan;
use App\Models\Patrocinio;
use App\Models\Organizador;
use App\Models\Sponsor;
use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EventoController extends Controller
{
    public function guardarEvento(Request $request)
    {

        $request->validate([
            'EVENTO_NOMBRE' => 'required|unique:evento',

        ]);

        try {
            $evento = new Evento;
            $evento->EVENTO_NOMBRE = $request->input('EVENTO_NOMBRE');
            $evento->EVENTO_TIPO = $request->input('EVENTO_TIPO');
            $evento->EVENTO_DESCRIPCION = $request->input('EVENTO_DESCRIPCION');
            $evento->EVENTO_MODALIDAD = $request->input('EVENTO_MODALIDAD');
            $evento->EVENTO_BASES = $request->input('EVENTO_BASES');
            $evento->EVENTO_UBICACION = $request->input('EVENTO_UBICACION');
            $evento->EVENTO_NOTIFICACIONES = $request->has('EVENTO_NOTIFICACIONES') ? 1 : 0;
            $evento->EVENTO_USUARIOS = $request->has('EVENTO_USUARIOS') ? 1 : 0;
            $evento->EVENTO_COSTO = $request->input('EVENTO_COSTO') ?? 0;
            $evento->save();

            if ($request->has('fechas.FECHA_NOMBRE') && $request->has('fechas.FECHA_FECHA')) {
                foreach ($request->input('fechas.FECHA_NOMBRE') as $key => $nombreFecha) {
                    $fecha = new Fecha;
                    $fecha->FECHA_NOMBRE = $nombreFecha;
                    $fecha->FECHA_FECHA = $request->input('fechas.FECHA_FECHA')[$key];
                    $fecha->FECHA_DESCRIPCION = $request->input('fechas.FECHA_DESCRIPCION')[$key];
                    $fecha->EVENTO_ID = $evento->EVENTO_ID;
                    $fecha->save();
                }
            }

            if ($request->has('requisitos.REQUISITO_NOMBRE')) {
                foreach ($request->input('requisitos.REQUISITO_NOMBRE') as $key => $nombreRequisito) {
                    $requisito = new Requisito;
                    $requisito->REQUISITO_NOMBRE = $nombreRequisito;
                    $requisito->EVENTO_ID = $evento->EVENTO_ID;
                    $requisito->save();
                }
            }

            return redirect()->route('evento')->withInput()->with('success', 'Evento y calendarización guardados correctamente.');
        } catch (ValidationException $e) {
            return redirect()->route('evento')->withErrors($e->validator->errors());
        }
    }

    public function misEventos()
    {
        $eventos = Evento::all();

        foreach ($eventos as $evento) {
            $evento->fechas = $this->obtenerFechas($evento->EVENTO_ID); // Asumiendo que el ID del evento es 'id'

        }
        return view('misEventos')->with('eventos', $eventos);
    }

    public function eventoDetalle()
    {
        $eventos = Evento::all();
        foreach ($eventos as $evento) {
            $evento->fechas = $this->obtenerFechas($evento->EVENTO_ID); // Asumiendo que el ID del evento es 'id'
            $evento->requisitos = $this->obtenerRequisitos($evento->EVENTO_ID);
        }

        return view('eventoDetalle', ['eventos' => $eventos]);
    }

    public function obtenerFechas($idEvento)
    {
        $fechas = Fecha::where('EVENTO_ID', $idEvento)->get();
        return $fechas;
    }
    public function obtenerRequisitos($idEvento)
    {
        $requisitos = Requisito::where('EVENTO_ID', $idEvento)->get();
        return $requisitos;
    }

    public function verEvento($eventoId)
    {
        $sponsor = [];
        $organizador = [];
        $evento = Evento::with(['fechas', 'imagenes'])->findOrFail($eventoId);
        $requisitos = Requisito::where('EVENTO_ID', $eventoId)->get();
        $contactos = Contacto::where('EVENTO_ID', $eventoId)->get();
        $organizan  = Organizan::where('EVENTO_ID',$eventoId)->first();

        $patrocinio =  Patrocinio::where('EVENTO_ID',$eventoId)->first();

        if($organizan != null){ 
            
            $organizador =  Organizador::where('ORGANIZADOR_ID',$organizan->ORGANIZADOR_ID)->get();
        }

        if($patrocinio != null){ 
            $sponsor =   Sponsor::where('SPONSOR_ID',$patrocinio->SPONSOR_ID )->get();
        }
        return view('ver', ['evento' => $evento, 'requisitos' => $requisitos, 'contactos' => $contactos, 'organizador' => $organizador,'sponsor' => $sponsor ]);
    }
    public function buscar(Request $request)
    {
        $query = $request->input('query');

        $eventos = Evento::where('EVENTO_NOMBRE', 'like', "%$query%")
            ->orWhere('EVENTO_TIPO', 'like', "%$query%")
            ->orWhere('EVENTO_MODALIDAD', 'like', "%$query%")
            ->orWhere('EVENTO_COSTO', 'like', "%$query%")
            ->get();

        return view('buscar', ['eventos' => $eventos]);
    }

    public function edit($id){
        $evento = Evento::with(['fechas', 'imagenes'])->findOrFail($id);

      

        $requisitos = Requisito::where('EVENTO_ID', $id)->get();
        $contactos = Contacto::where('EVENTO_ID', $id)->get();
        return view('event.event-edit', ['evento' => $evento, 'requisitos' => $requisitos, 'contactos' => $contactos]);
    }

    public function update(Request $request){ 
           
        try {
            $evento = Evento::find($request->EVENT_ID);
            $evento->EVENTO_NOMBRE = $request->input('EVENTO_NOMBRE');
            $evento->EVENTO_TIPO = $request->input('EVENTO_TIPO');
            $evento->EVENTO_DESCRIPCION = $request->input('EVENTO_DESCRIPCION');
            $evento->EVENTO_MODALIDAD = $request->input('EVENTO_MODALIDAD');
            $evento->EVENTO_BASES = $request->input('EVENTO_BASES');
            $evento->EVENTO_UBICACION = $request->input('EVENTO_UBICACION');
            $evento->EVENTO_NOTIFICACIONES = $request->has('EVENTO_NOTIFICACIONES') ? 1 : 0;
            $evento->EVENTO_USUARIOS = $request->has('EVENTO_USUARIOS') ? 1 : 0;
            $evento->EVENTO_COSTO = $request->input('EVENTO_COSTO') ?? 0;
            $evento->save();

        
            

           // $claves = array_keys($request->fechas);


        
            if ($request->has('fechas.FECHA_NOMBRE') && $request->has('fechas.FECHA_FECHA') && $request->has('fechas.FECHA_ID') ) {
                foreach ($request->input('fechas.FECHA_NOMBRE') as $key => $nombreFecha) {
                        $fecha = Fecha::findOrNew($request->input('fechas.FECHA_ID')[$key])->first();
                        $fecha->FECHA_NOMBRE = $nombreFecha;
                        $fecha->FECHA_FECHA = $request->input('fechas.FECHA_FECHA')[$key];
                        $fecha->FECHA_DESCRIPCION = $request->input('fechas.FECHA_DESCRIPCION')[$key];
                        $fecha->EVENTO_ID = $evento->EVENTO_ID;
                        $fecha->save();      
                }
            }

            if ($request->has('requisitos.REQUISITO_NOMBRE')) {
                foreach ($request->input('requisitos.REQUISITO_NOMBRE') as $key => $nombreRequisito) {
                    $requisito = Requisito::findOrNew($request->input('requisitos.REQUISITO_ID')[$key]);
                    $requisito->REQUISITO_NOMBRE = $nombreRequisito;
                    $requisito->EVENTO_ID = $evento->EVENTO_ID;
                    $requisito->save();
                }
            }

            return redirect()->route('misEventos')->withInput()->with('success', 'Evento y actualizado correctamente.');
        } catch (ValidationException $e) {
            return redirect()->route('evento')->withErrors($e->validator->errors());
        }

    }
    public function eliminar($id){ 
        $fechas = Fecha::where('EVENTO_ID',$id)->get();
         foreach( $fechas as $fecha){
             $fecha->delete();
         }
         $requesitos = Requisito::where('EVENTO_ID',$id)->get();
    
         foreach( $requesitos as $requisto){
            $requisto->delete();
         }

         $patrocinios=  Patrocinio::where('EVENTO_ID',$id)->get(); 
       
         foreach($patrocinios as $patrocinio){ 
            $patrocinio->delete();
         }

          $organize = Organizan::where('EVENTO_ID',$id)->get();
          foreach($organize as $or){ 
            $or->delete();
         }

         $contacto = Contacto::where('EVENTO_ID',$id)->get();
         foreach($contacto as $con){ 
           $con->delete();
        }

        $imagen = Imagen::where('EVENTO_ID',$id)->get();
        foreach($imagen as $im){ 
          $im->delete();
        }

     
        $evento = Evento::find($id)->delete();
        return redirect()->route('misEventos')->withInput()->with('success', 'Evento eliminado.');

     } 

     public function  asignarUser($id){ 
        
        return view('event.user-register');
     }
    
}
