<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class eventoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo' => 'required|regex:/^[a-zA-Z\s áéíóúÁÉÍÓÚñÑ]+$/u',
            'descripcion' => 'required|regex:/^[a-zA-Z\s áéíóúÁÉÍÓÚñÑ]+$/u',
            
            'fecha_inicio' => 'required|fecha|after_or_equal:now',
            
            'duracion'=>'required',
            'competencia'=>'in:grupal,individual',
            
            'requisitos'=>'required|string',
            'direccion'=>'required|string',

            'foto'=>'required',
            'contactos'=> 'required|regex:/^[0-9 ,]+$/u',

            'afiche'=>'required|file|image',
            'costo'=>'required|numeric|decimal:2|min:0'
            
        ];

    }
}
