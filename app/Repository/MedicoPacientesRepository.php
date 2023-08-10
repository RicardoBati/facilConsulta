<?php
    
namespace App\Repository;

use App\Exceptions\GeneralJsonException;
use App\Models\Medico_paciente;
use App\Models\Medico;
use App\Models\Paciente;
use Exception;
use Illuminate\Http\Request;

class MedicoPacientesRepository {

    public function salvaMedicoPaciente (Request $request) : array {

        $medico_id = $request->input('medico_id');
        $paciente_id = $request->input('paciente_id');
        
        // Verifica se o medico e o paciente já possuem vinculo
        throw_if(!empty(Medico_paciente::where('medico_id',$medico_id)->where('paciente_id',$paciente_id)->get()->toArray()), GeneralJsonException::class, 'Medico e paciente já vinculados');

        $medicoPaciente = new Medico_paciente;
        $medicoPaciente->medico_id = $medico_id;
        $medicoPaciente->paciente_id = $paciente_id;

        // Verifica se o salvamento foi efetuado
        throw_if(!$medicoPaciente->save(), GeneralJsonException::class, 'Erro ao vincular médico e paciente');

        //Retorna medico e paciente vinculados
        $medicoVinculado =  Medico::find($medico_id);  
        $pacienteVinculado = Paciente::find($paciente_id);
        
        $medicoPacienteRetorno = [
            'medico' => $medicoVinculado,
            'paciente' => $pacienteVinculado
        ];

        return $medicoPacienteRetorno;
    }

} 
