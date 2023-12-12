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
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EventoController extends Controller
{
    public function guardarEvento(Request $request)
    {

        $request->validate([
            'EVENTO_NOMBRE' => 'required|unique:evento'

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

            if ($request->has('fechas.FECHA_NOMBRE') && $request->has('fechas.FECHA_INICIO') && $request->has('fechas.FECHA_FINAL')) {
                foreach ($request->input('fechas.FECHA_NOMBRE') as $key => $nombreFecha) {
                    $fecha = new Fecha;
                    $fecha->FECHA_NOMBRE = $nombreFecha;
                    $fecha->FECHA_INICIO = $request->input('fechas.FECHA_INICIO')[$key];
                    $fecha->FECHA_FINAL = $request->input('fechas.FECHA_FINAL')[$key];
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
            $evento->fechas = $this->obtenerFechas($evento->EVENTO_ID);
        }
        return view('misEventos')->with('eventos', $eventos);
    }

    public function eventoDetalle()
    {
        $eventos = Evento::all();
        foreach ($eventos as $evento) {
            $evento->fechas = $this->obtenerFechas($evento->EVENTO_ID);
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
            ->get();

        return view('buscar', ['eventos' => $eventos]);
    }

    public function editarNew($eventoId)
    {
       
       
        $evento = Evento::with(['fechas', 'requisitos'])->findOrFail($eventoId);
        $requisitos = Requisito::where('EVENTO_ID', $eventoId)->get();

       
        return view('event.event-edit', [
            'evento' => $evento,
            'requisitos' => $requisitos 
        ]);
    }

    public function updateAfiche(Request $request){
        $request->validate([
            'banner' => 'image|max:10240',
            'afiche' => 'image|max:10240',
            'imagenesDiversas.*' => 'image|max:10240',
        ]);
        

      
        try {
            $eventoId = $request->input('evento_id');

            $this->registrarImagen('banner', $request->file('banner'), $request->evento_id);
            $this->registrarImagen('afiche', $request->file('afiche'), $request->evento_id);


            if ($request->hasFile('imagenesDiversas') && is_array($request->file('imagenesDiversas'))) {
                foreach ($request->file('imagenesDiversas') as $key => $imagen) {
                    $tipo = 'imagenvariada' . $request->evento_id . '-' . $key;
                    $this->registrarImagen('imagen', $imagen, $request->evento_id, $tipo);
                }
            }

            return redirect()->route('misEventos')->withInput()->with('success', 'Imagenes guardadas correctamente.');
        } catch (ValidationException $e) {
            return redirect()->route('imagen')->withErrors($e->validator->errors());
        }
    }

    public function updateContacto(Request $request){

        $eventoId = $request->evento_id;
        $contacto =  Contacto::where('EVENTO_ID', $eventoId)->first();
     
        $contacto->CONTACTO_NUMERO = $request->CONTACTO_NUMERO;
        $contacto->CONTACTO_EMAIL = $request->CONTACTO_EMAIL;
        $contacto->EVENTO_ID = $eventoId;
        $contacto->save();

        return redirect()->route('misEventos')->withInput()->with('success', 'Imagenes guardadas correctamente.');
    }


    private function registrarImagen($tipo, $imagen, $eventoId, $sufijo = '')
    {
        $imagenExistente = Imagen::where('EVENTO_ID', $eventoId)
            ->where('IMAGEN_TIPO', $tipo)
            ->first();

        if ($imagenExistente && $tipo !== 'imagen') {
            Storage::disk('public')->delete($imagenExistente->IMAGEN_IMAGEN);
            $imagenExistente->delete();
        }

        if ($imagen && $imagen->isValid()) {
            $nombreImagen = $tipo . '_' . $eventoId . $sufijo . '.' . $imagen->getClientOriginalExtension();
            $ruta = 'imagenes_evento/' . $nombreImagen;

            Storage::disk('public')->makeDirectory('imagenes_evento');
            Storage::disk('public')->put($ruta, file_get_contents($imagen), 'public');

            $imagenModel = new Imagen;
            $imagenModel->EVENTO_ID = $eventoId;
            $imagenModel->IMAGEN_IMAGEN = $ruta;
            $imagenModel->IMAGEN_TIPO = $tipo;
            $imagenModel->save();
        }
    }

    public function editarAfiche($eventoId)
    {
       
       
        $evento = Evento::with(['fechas', 'requisitos'])->findOrFail($eventoId);
        $requisitos = Requisito::where('EVENTO_ID', $eventoId)->get();
        $eventos = Evento::all();
       
        return view('event.editar_afiche', [
            'evento' => $evento,
            'requisitos' => $requisitos,
            'eventos' =>   $eventos
        ]);
    }

    public function editarContacto($eventoId)
    {
       
       
        $evento = Evento::with(['fechas', 'requisitos'])->findOrFail($eventoId);
        $requisitos = Requisito::where('EVENTO_ID', $eventoId)->get();
        $eventos = Evento::all();
        $contacto = Contacto::where('EVENTO_ID', $eventoId)->first();

        
       
        return view('event.editar_contacto', [
            'evento' => $evento,
            'requisitos' => $requisitos,
            'eventos' =>   $eventos,
            'contacto' =>  $contacto
        ]);
    }

    public function vistaSeleccionarEvento()
    {
        $eventos = Evento::all();
        return view('seleccionarEvento', compact('eventos'));
    }

    public function editarEvento(Request $request)
    {
      
        $eventoId = $request->evento_id;
        $event = Evento::find($eventoId);
        
        return view('event.check_event', compact('event'));
      //  return redirect()->route('editarEvento', ['eventoId' => $eventoId]);
    }

    public function update(Request $request){ 
           
        try {
            
            $evento = Evento::find($request->EVENT_ID);
         
            $evento->EVENTO_UBICACION = $request->input('EVENTO_UBICACION');
            
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
         
       
         if( $patrocinios != null){
            foreach($patrocinios as $patrocinio){ 
                /*
                $patri =  Patrocinio::where('EVENTO_ID',$id)->where('SPONSOR_ID', $patrocinio->SPONSOR_ID)->first(); 
                $patri->delete();
                */
             }
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



    public function editEvent(Request $request)
    {
        $eventoId = $request->input('evento_id');
        return redirect()->route('editarEvento', ['eventoId' => $eventoId]);
    }

    public function actualizar(Request $request, $eventoId)
    {
        $request->validate([
            'EVENTO_NOMBRE' => 'required|unique:evento'
        ]);

        try {
            $evento = Evento::findOrFail($eventoId);


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
            if ($request->has('fechas.FECHA_NOMBRE') && $request->has('fechas.FECHA_FINAL') && $request->has('fechas.FECHA_FINAL')) {
                $evento->fechas()->delete();

                foreach ($request->input('fechas.FECHA_NOMBRE') as $key => $nombreFecha) {
                    $fecha = new Fecha;
                    $fecha->FECHA_NOMBRE = $nombreFecha;
                    $fecha->FECHA_INICIO = $request->input('fechas.FECHA_INICIO')[$key];
                    $fecha->FECHA_INICIO = $request->input('fechas.FECHA_FINAL')[$key];
                    $fecha->FECHA_DESCRIPCION = $request->input('fechas.FECHA_DESCRIPCION')[$key];
                    $evento->fechas()->save($fecha);

                }
            }

            if ($request->has('requisitos.REQUISITO_NOMBRE')) {
                $evento->requisitos()->delete();

                foreach ($request->input('requisitos.REQUISITO_NOMBRE') as $key => $nombreRequisito) {
                    $requisito = new Requisito;
                    $requisito->REQUISITO_NOMBRE = $nombreRequisito;
                    $evento->requisitos()->save($requisito);
                }
            }

            return redirect()->route('editarEvento', ['evento' => $eventoId])->withInput()->with('success', 'Evento y calendarización actualizados correctamente.');
        } catch (ValidationException $e) {
            return redirect()->route('editarEvento', ['evento' => $eventoId])->withErrors($e->validator->errors());
        }
    }

}
