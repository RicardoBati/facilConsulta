<?php
    
namespace App\Repository;

use App\Models\Cidades;


class CidadesRepository {

    public function buscaCidades()  {

        //Busca e retorna todas as cidades encontradas
        $cidade = Cidades::get();
        return $cidade;
    }

} 
