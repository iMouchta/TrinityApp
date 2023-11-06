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
        $eventos = Evento::all(); // Obtener eventos ya registrados
        return view('imagen', compact('eventos'));
    }

    public function guardarImagen(Request $request)
    {
        $request->validate([
            'evento_id' => 'required|exists:evento,EVENTO_ID',
            'banner' => 'image|mimes:jpeg,png,jpg,gif|max:2048|unique:imagen,IMAGEN_TIPO,NULL,EVENTO_ID,' . $request->input('evento_id'),
            'icono' => 'image|mimes:jpeg,png,jpg,gif|max:2048|unique:imagen,IMAGEN_TIPO,NULL,EVENTO_ID,' . $request->input('evento_id'),
            'afiche' => 'image|mimes:jpeg,png,jpg,gif|max:2048|unique:imagen,IMAGEN_TIPO,NULL,EVENTO_ID,' . $request->input('evento_id'),
            'imagenesDiversas.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $eventoId = $request->input('evento_id');

        $this->registrarImagen('banner', $request->file('banner'), $eventoId);

        $this->registrarImagen('icono', $request->file('icono'), $eventoId);

        $this->registrarImagen('afiche', $request->file('afiche'), $eventoId);

        if ($request->hasFile('imagenesDiversas')) {
            foreach ($request->file('imagenesDiversas') as $key => $imagen) {
                $tipo = 'imagenvariada-' . $eventoId . '-' . $key;
                $this->registrarImagen($tipo, $imagen, $eventoId);
            }
        }


        return redirect()->route('imagen')->with('success', 'Imágenes guardadas correctamente.');
    }

    private function registrarImagen($tipo, $imagen, $eventoId)
    {
        $imagenExistente = Imagen::where('EVENTO_ID', $eventoId)
            ->where('IMAGEN_TIPO', $tipo)
            ->first();

        if ($imagenExistente) {
            // Si la imagen ya existe, eliminarla antes de guardar la nueva
            Storage::delete($imagenExistente->IMAGEN_IMAGEN);
            $imagenExistente->delete();
        }

        if ($imagen) {
            $nombreImagen = $tipo . '.' . $imagen->getClientOriginalExtension();
            $ruta = $imagen->storeAs('imagenes_evento', $nombreImagen, 'local');

            $imagenModel = new Imagen;
            $imagenModel->EVENTO_ID = $eventoId;
            $imagenModel->IMAGEN_IMAGEN = $ruta;
            $imagenModel->IMAGEN_TIPO = $tipo;
            $imagenModel->save();
        }
    }
}
