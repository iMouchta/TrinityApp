<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    // public function index()
    // {
    //     return view('home');
    // }
    
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('uploads', $fileName, 'public');
            return "Archivo subido correctamente: $fileName";
        }
        return "No se seleccionó ningún archivo.";
    }
}