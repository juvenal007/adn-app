<?php

namespace App\JsonResponse;

class Response
{
    public static function add($request)
    {
        return response()->json(['response' => ['status' => true, 'data' => $request, 'message' => 'Creación Exitosa.']], 200);
    }
    public static function edit($request)
    {
        return response()->json(['response' => ['status' => true, 'data' => $request, 'message' => 'Actualización Exitosa.']], 200);
    }
    public static function details($request)
    {
        return response()->json(['response' => ['status' => true, 'data' => $request, 'message' => 'Busqueda Exitosa.']], 200);
    }
    public static function delete($request)
    {
        return response()->json(['response' => ['status' => true, 'data' => $request, 'message' => 'Eliminación Exitosa.']], 200);
    }
    public static function custom($request, $mensaje)
    {
        return response()->json(['response' => ['status' => true, 'data' => $request, 'message' => $mensaje]], 200);
    }
    public static function customFalse($request, $mensaje)
    {
        return response()->json(['response' => ['type_error' => 'validation_error', 'status' => false, 'data' => $request, 'message' => $mensaje]], 400);
    }
    public static function catch($request)
    {
        return response()->json(['response' => ['type_error' => 'query_exception', 'status' => false, 'data' => $request, 'message' => 'Error processing']], 500);
    }
    public static function validation($validar)
    {
        return response()->json(['response' => ['type_error' => 'validation_error', 'status' => false, 'data' => $validar->errors(), 'message' => 'Validation errors']], 400);
    }
    public static function is_null()
    {
        return response()->json(['response' => ['type_error' => 'validation_error', 'status' => false, 'data' => "Registro no encontrado", 'message' => 'Registro no encontrado.']], 400);
    }
}
