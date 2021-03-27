<?php

namespace App\Http\Controllers;

use App\JsonResponse\Response;
use App\Models\Perro;
use App\Models\Raza;
use App\Validate\PerroValidate;
use Illuminate\Http\Request;

class PerroController extends Controller
{
    public function list()
    {
        try {
            $perros = Perro::with('raza')->get();
            $listPerros = [];
            foreach ($perros as $key => $perro) {
                $perro->perro_raza_txt = $perro['raza']->raza_nombre;
                array_push($listPerros, $perro);
            }
            return Response::custom($listPerros, 'Lista Obtenida');
        } catch (\Illuminate\Database\QueryException $e) {
           return Response::catch($e);
        }
    }

    public function add(Request $request)
    {
        try {
            $validar = PerroValidate::validateAdd($request);
            if ($validar->fails()) {
                return Response::validation($validar);
            }
            $perro = new Perro($request->data);
            $perro->save();
            return Response::add($perro);
        } catch (\Illuminate\Database\QueryException $e) {
            return Response:: catch($e);
        }
    }

    public function details($id)
    {
        try {
            $perro = Perro::with('raza')->find($id);
            if (is_null($perro)) {
                return Response::is_null();
            }
            return Response::details($perro);
        } catch (\Illuminate\Database\QueryException $e) {
            return Response:: catch($e);
        }
    }
    public function edit($id, Request $request)
    {
        try {
            $validar = PerroValidate::validateEdit($id, $request);
            if ($validar->fails()) {
                return Response::validation($validar);
            }
            $perro = $this->instanciaPerro($id, $request);
            $perro->save();
            return Response::edit($perro);
        } catch (\Illuminate\Database\QueryException $e) {
            return Response:: catch($e);
        }
    }
    public function delete($id)
    {
        try {
            $perro = Perro::find($id);
            if (!isset($perro)) {
                return Response::is_null();
            }
            $perro->delete();
            return Response::delete($perro);
        } catch (\Illuminate\Database\QueryException $e) {
            return Response:: catch($e);
        }
    }
    public function instanciaPerro($id, Request $request)
    {
        $perro = Perro::find($id);
        $raza = Raza::find($request->data['perro_raza_id']);
        $perro->perro_nombre = $request->data['perro_nombre'];
        $perro->perro_color = $request->data['perro_color'];
        $perro->perro_edad = $request->data['perro_edad'];
        $perro->perro_raza_id = $raza->id;
        return $perro;
    }
}
