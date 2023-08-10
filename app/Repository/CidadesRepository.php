<?php
    
namespace App\Repository;

use App\Http\Controllers\CidadesController;
use App\Models\Cidades;
use Illuminate\Http\Request;


class CidadesRepository {

    public function buscaCidades()  {

        //Busca e retorna todas as cidades encontradas
        $cidade = Cidades::get();
        return $cidade;
    }

} 
