<?php
    
namespace App\Repository;

use App\Exceptions\GeneralJsonException;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PacienteRepository {

    public function salvaPaciente(Request $request) : string {

        $paciente = new Paciente;
        $paciente->nome = $request->input('nome');
        $paciente->cpf = $request->input('cpf');
        $paciente->celular = $request->input('celular');

        //Verifica se o salvamento do paciente foi efetuado, se sim retorna o paciente registrado
        throw_if(!$paciente->save(), GeneralJsonException::class, 'Erro ao cadastrar paciente');

        return $paciente;
    }

    public function listaPacientesMedico(int $medico_id) : string {

        //lista pacientes de um medico
        $listaPaciente = DB::table('pacientes')
            ->join('medico_pacientes', 'pacientes.id', '=', 'medico_pacientes.paciente_id')
            ->join('medicos', 'medico_pacientes.medico_id', '=',  'medicos.id')
            ->where('medicos.id',$medico_id)
            ->select('pacientes.*')
            ->get();

        //verifica se a consulta foi efetuada, se sim retorna a lista de pacientes do médico
        throw_if(!$listaPaciente, GeneralJsonException::class, 'Erro ao listar pacientes por médico');

        return $listaPaciente;
    }

    public function atualizarPaciente(Request $request, int $id_paciente) : string {
        
        //Busca paciente a ser atualizado
        throw_if(!$paciente = Paciente::find($id_paciente), GeneralJsonException::class, 'Paciente não encontrado');


        if (!empty($request->input('nome'))) {
            $paciente->nome = $request->input('nome');
        }
        if (!empty($request->input('cpf'))) {
            $paciente->cpf = $request->input('cpf');
        }
        if (!empty($request->input('celular'))) {
            $paciente->celular = $request->input('celular');
        }
        
        throw_if(!$paciente->save(), GeneralJsonException::class, 'Erro ao atualizar paciente');

        return $paciente;
    }
} 
