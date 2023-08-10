<?php

namespace App\Http\Controllers;
use App\Repository\MedicoRepository;
use App\Repository\MedicoPacientesRepository;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    /**
     * Adicionar médico.
     */
    public function store(Request $request)
    {
        $medicoRepository = new MedicoRepository;

        return response()->json(json_decode($medicoRepository->salvaMedico($request)));
    }

    /**
     * Vincular médico e paciente.
     */
    public function vinculaMedicoPaciente(Request $request)
    {
        $medicoPacienteRepository = new MedicoPacientesRepository;
        
        return response()->json($medicoPacienteRepository->salvaMedicoPaciente($request));
        
    }

    /**
     * Listar médicos de uma cidade.
     */
    public function buscaMedicoCidade($cidade_id)
    {
        $medicoRepository = new MedicoRepository;

        return response()->json(json_decode($medicoRepository->listaMedicoCidade($cidade_id)));

    }

    /**
     * Listar médicos.
     */
    public function show()
    {
        $medicoRepository = new MedicoRepository;
        return response()->json(json_decode($medicoRepository->listaMedico()));
    }
}
