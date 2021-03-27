<?php

namespace App\Validate;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RazaValidate
{
    const MESSAGES = [
        'required' => 'El atributo :attribute es requerido.',
        'max' => 'El atributo :attribute  no puede exceder los :max caracteres',
        'min' => 'El atributo :attribute  no puede contener menos de los :min caracteres',
        'unique' => 'El atributo de :attribute ya existe',

    ];

    const CUSTOM_ATTRIBUTES = [
        'raza_nombre' => 'Nombre',
        'raza_descripcion' => 'Descripción'
    ];

    public static function validateAdd(Request $request)
    {
        $validar = Validator::make($request->data, [
            'raza_nombre' => 'required|unique:razas,raza_nombre|max:100|min:2',
            'raza_descripcion' => 'max:100|min:2'
        ], RazaValidate::MESSAGES, RazaValidate::CUSTOM_ATTRIBUTES);
        return $validar;
    }

    public static function validateEdit($id, Request $request)
    {
        $validar = Validator::make($request->data, [
            'raza_nombre' => 'required|max:100|min:2|unique:razas,raza_nombre,' . $id,
            'raza_descripcion' => 'max:100|min:2'
        ], RazaValidate::MESSAGES, RazaValidate::CUSTOM_ATTRIBUTES);
        return $validar;
    }
}
