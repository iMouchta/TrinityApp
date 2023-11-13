<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Imagen;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ImagenController extends Controller
{
    public function mostrarFormulario()
    {
        $eventos = Evento::all();
        return view('imagen', compact('eventos'));
    }

    public function guardarImagen(Request $request)
    {
        $eventoId = $request->input('evento_id');

        $this->registrarImagen('banner', $request->file('banner'), $eventoId, 'banner');

        $this->registrarImagen('icono', $request->file('icono'), $eventoId, 'icono');

        $this->registrarImagen('afiche', $request->file('afiche'), $eventoId, 'afiche');;

        if ($request->hasFile('imagenesDiversas') && is_array($request->file('imagenesDiversas'))) {
            foreach ($request->file('imagenesDiversas') as $key => $imagen) {
                $tipo = 'imagenvariada-' . $eventoId . '-' . $key;
                $this->registrarImagen('imagen', $imagen, $eventoId, $tipo);
            }
        }
        

        return redirect()->route('imagen')->with('success', 'Imágenes guardadas correctamente.');
    }

    private function registrarImagen($tipo, $imagen, $eventoId, $tipoImagen)
    {
        $imagenExistente = Imagen::where('EVENTO_ID', $eventoId)
            ->where('IMAGEN_TIPO', $tipoImagen)
            ->first();

        if ($imagenExistente) {
            Storage::delete($imagenExistente->IMAGEN_IMAGEN);
            $imagenExistente->delete();
        }

        if ($imagen) {
            $nombreImagen = $tipoImagen . '.' . $imagen->getClientOriginalExtension();
            $ruta = $imagen->storeAs('imagenes_evento', $nombreImagen, 'local');
            $imagenModel = new Imagen;
            $imagenModel->EVENTO_ID = $eventoId;
            $imagenModel->IMAGEN_IMAGEN = $ruta;
            $imagenModel->IMAGEN_TIPO = $tipoImagen;
            $imagenModel->save();
        }
    }
}
