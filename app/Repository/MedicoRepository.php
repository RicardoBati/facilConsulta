<?php
    
namespace App\Repository;

use App\Exceptions\GeneralJsonException;
use App\Models\Cidades;
use App\Models\Medico;
use Illuminate\Http\Request;


class MedicoRepository {

    public function salvaMedico(Request $request) : string {


        $medico = new Medico;
        $medico->setNome($request->input('nome'));
        $medico->setEspecialidade($request->input('especialidade'));
        $medico->setCidadeId($request->input('cidade_id'));

        //Verifica se o salvamento do medico foi efetuado, se sim retorna o medico registrado
        throw_if(!$medico->save(), GeneralJsonException::class, 'Erro ao cadastrar novo médico');

        return $medico;
    }

    public function listaMedicoCidade(int $cidade_id) : string {

        //Verifica se existe a cidade
        $cidades = Cidades::find($cidade_id);
        throw_if(!$cidades, GeneralJsonException::class, 'Cidade não cadastrada');

        //Retorna os medicos da cidade do ID correspondente
        return Medico::where('cidade_id',$cidade_id)->get();
    }

    public function listaMedico() : string {
        //Busca todos os médicos cadastrados
        return Medico::get();        
    }
} 
