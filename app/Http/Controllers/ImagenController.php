<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Imagen;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ImagenController extends Controller
{
    public function mostrarFormulario()
    {
        $eventos = Evento::all();
        return view('imagen', compact('eventos'));
    }

    public function guardarImagen(Request $request)
    {
        $request->validate([
            'banner' => 'image|max:10240',
            'icono' => 'image|max:10240',
            'afiche' => 'image|max:10240',
            'imagenesDiversas.*' => 'image|max:10240',
        ]);
        
        try {
            $eventoId = $request->input('evento_id');

            $this->registrarImagen('banner', $request->file('banner'), $eventoId);
            $this->registrarImagen('icono', $request->file('icono'), $eventoId);
            $this->registrarImagen('afiche', $request->file('afiche'), $eventoId);


            if ($request->hasFile('imagenesDiversas') && is_array($request->file('imagenesDiversas'))) {
                foreach ($request->file('imagenesDiversas') as $key => $imagen) {
                    $tipo = 'imagenvariada' . $eventoId . '-' . $key;
                    $this->registrarImagen('imagen', $imagen, $eventoId, $tipo);
                }
            }

            return redirect()->route('imagen')->withInput()->with('success', 'Imagenes guardadas correctamente.');
        } catch (ValidationException $e) {
            return redirect()->route('imagen')->withErrors($e->validator->errors());
        }
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
}
