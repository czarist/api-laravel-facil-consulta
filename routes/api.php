<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('/user', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/medicos/consulta', [ConsultaController::class, 'store']);
    Route::get('/medicos/{id_medico}/pacientes', [PacienteController::class, 'list']);
    Route::post('/pacientes/{id}', [PacienteController::class, 'update']);
    Route::post('/pacientes', [PacienteController::class, 'store']);
    Route::post('/medicos', [MedicoController::class, 'store']);
});

Route::get('/cidades', [CidadeController::class, 'index']);
Route::get('/cidades/{cidadeId}/medicos', [MedicoController::class, 'listarPorCidade']);
Route::get('/medicos', [MedicoController::class, 'index']);
