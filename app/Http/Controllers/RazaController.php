<?php

namespace App\Http\Controllers;

use App\JsonResponse\Response;
use App\Models\Perro;
use App\Models\Raza;
use App\Validate\RazaValidate;
use Illuminate\Http\Request;

class RazaController extends Controller
{
    public function list()
    {
        try {
            $listRaza = Raza::all();
            return Response::custom($listRaza, "Lista Razas");
        } catch (\Illuminate\Database\QueryException $e) {
            return Response:: catch($e);
        }
    }
    public function add(Request $request)
    {
        try {
            $validar = RazaValidate::validateAdd($request);
            if ($validar->fails()) {
                return Response::validation($validar);
            }
            $raza = new Raza($request->data);
            $raza->save();
            return Response::add($raza);
        } catch (\Illuminate\Database\QueryException $e) {
            return Response::catch($e);
        }
    }

    public function details($id)
    {
        try {
            $raza = Raza::find($id);
            if (is_null($raza)) {
                return Response::is_null();
            }
            return Response::details($raza);
        } catch (\Illuminate\Database\QueryException $e) {
            return Response::catch($e);
        }
    }
    public function edit($id, Request $request)
    {
        try {
            $validar = RazaValidate::validateEdit($id, $request);
            if ($validar->fails()) {
                return Response::validation($validar);
            }
            $raza = Raza::find($id);
            $raza = $this->instanciaRaza($raza, $request);
            $raza->save();
            return Response::edit($raza);
        } catch (\Illuminate\Database\QueryException $e) {
            return Response::catch($e);
        }
    }
    public function delete($id)
    {
        try {
            $raza = Raza::find($id);
            if (!isset($raza)) {
                return Response::is_null();
            }
            $perros = Perro::where('perro_raza_id', $id)->get();
            if(count($perros) > 0){
                return Response::customFalse($perros, 'Datos asociados.');
            }
            $raza->delete();
            return Response::delete($raza);
        } catch (\Illuminate\Database\QueryException $e) {
            return Response::catch($e);
        }
    }
    public function instanciaRaza($raza, Request $request)
    {
        $raza->raza_nombre = $request->data['raza_nombre'];
        $raza->raza_descripcion = $request->data['raza_descripcion'];
        return $raza;
    }
}
