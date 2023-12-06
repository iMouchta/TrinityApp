<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class MailController extends Controller
{
    public function mostrarFormulario()
    {
        return view('formulario');
    }

    public function enviarCorreo()
    {
        $details = [
            'title' => 'Correo de su amigo',
            'body' => 'Este es un ejemplo'
        ];

        Mail::to("imouchta@gmail.com")->send(new TestMail($details));

        return "Correo Electrónico ENVIADO a jon";
    }

    public function enviarCorreoPersonalizado(Request $request)
    {
        $request->validate([
            'destinatario' => 'required|email',
            'asunto' => 'required',
            'mensaje' => 'required',
        ]);

        $details = [
            'destinatario' => $request->input('destinatario'),
            'title' => $request->input('asunto'),
            'body' => $request->input('mensaje'),
        ];

        Mail::to($request->input('destinatario'))->send(new TestMail($details));

        return "Correo Electrónico ENVIADO a " . $request->input('destinatario');
    }
}
