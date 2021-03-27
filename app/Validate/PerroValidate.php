<?php

namespace App\Validate;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PerroValidate
{
    const MESSAGES = [
        'required' => 'El atributo :attribute es requerido.',
        'max' => 'El atributo :attribute  no puede exceder los :max caracteres',
        'min' => 'El atributo :attribute  no puede contener menos de los :min caracteres',
        'unique' => 'El atributo de :attribute ya existe',

    ];

    const CUSTOM_ATTRIBUTES = [
        'perro_nombre' => 'Nombre',
        'perro_color' => 'Color',
        'perro_edad' => 'Edad',
        'perro_raza_id' => 'Raza'
    ];

    public function __construct()
    {

    }

    public static function validateAdd(Request $request)
    {
        $validar = Validator::make($request->data, [
            'perro_nombre' => 'required|unique:perros,perro_nombre|max:100|min:2',
            'perro_color' => 'max:100|min:2',
            'perro_edad' => 'max:100|min:2',
            'perro_raza_id' => 'required|max:100|min:1',
        ], PerroValidate::MESSAGES, PerroValidate::CUSTOM_ATTRIBUTES);
       return $validar;
    }

    public static function validateEdit($id, Request $request)
    {
        $validar = Validator::make($request->data, [
            'perro_nombre' => 'required|max:100|min:2|unique:perros,perro_nombre,'.$id,
            'perro_color' => 'max:100|min:2',
            'perro_edad' => 'max:100|min:2',
            'perro_raza_id' => 'required|max:100|min:1',
        ], PerroValidate::MESSAGES, PerroValidate::CUSTOM_ATTRIBUTES);
       return $validar;
    }
}
