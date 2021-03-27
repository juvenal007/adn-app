<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PerroController;
use App\Http\Controllers\RazaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['middleware' => ['jwt.verify']], function () {


    // PERRO
    Route::get('/perro/list', [PerroController::class, 'list']);
    Route::post('/perro/store', [PerroController::class, 'add']);
    Route::put('/perro/update/{id}', [PerroController::class, 'edit']);
    Route::get('/perro/details/{id}', [PerroController::class, 'details']);
    Route::delete('/perro/delete/{id}', [PerroController::class, 'delete']);

    // RAZA
    Route::get('/raza/list', [RazaController::class, 'list']);
    Route::post('/raza/store', [RazaController::class, 'add']);
    Route::put('/raza/update/{id}', [RazaController::class, 'edit']);
    Route::get('/raza/details/{id}', [RazaController::class, 'details']);
    Route::delete('/raza/delete/{id}', [RazaController::class, 'delete']);

});
