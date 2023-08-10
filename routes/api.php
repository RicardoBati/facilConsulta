<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CidadesController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

//AUTENTICAÇÃO
Route::post('/login',                            [AuthController::class     , 'login'])->name('login');

//ROTAS PROTEGIDAS
Route::middleware('auth:api')->group(function () {
    Route::get('/medicos/{medico_id}/pacientes', [PacienteController::class , 'show']);
    Route::post('/pacientes/{pacientes_id}',     [PacienteController::class , 'update']);
    Route::post('/pacientes',                    [PacienteController::class , 'store']);
    Route::post('/medicos',                      [MedicoController::class   , 'store']);
    Route::post('/medicos/{medico_id}/pacientes',[MedicoController::class   , 'vinculaMedicoPaciente']);
    Route::get('/user',                          [UserController::class     , 'show']);
});

//ROTAS PUBLICAS
Route::get('/cidades',                           [CidadesController::class  , 'show']);
Route::get('/medicos',                           [MedicoController::class   , 'show']);
Route::get('/cidades/{cidade_id}/medicos',       [MedicoController::class   , 'buscaMedicoCidade']);




