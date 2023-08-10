<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\PacienteRepository;


class PacienteController extends Controller
{
    /**
     * Adicionar paciente.
     */
    public function store(Request $request)
    {
        $pacienteRepository = new PacienteRepository;
        
        return response()->json(json_decode($pacienteRepository->salvaPaciente($request)));
    }

    /**
     * Listar pacientes do médico.
     */
    public function show(int $medico_id)
    {
        $pacienteRepository = new PacienteRepository;
        
        return response()->json(json_decode($pacienteRepository->listaPacientesMedico($medico_id)));
    }

    /**
     * Atualizar paciente.
     */
    public function update(Request $request, int $id_paciente)
    {
        $pacienteRepository = new PacienteRepository;
        return response()->json(json_decode($pacienteRepository->atualizarPaciente($request, $id_paciente)));

    }
}
