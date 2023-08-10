<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repository\CidadesRepository;

class CidadesController extends Controller
{
    /**
     * Listar Cidades.
     */
    public function show(Request $request)
    {
        $cidadeRepository = new CidadesRepository;
        
        return $cidadeRepository->buscaCidades();
    }
}
