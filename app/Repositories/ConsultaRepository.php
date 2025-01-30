<?php
namespace App\Repositories;

use App\Models\Consulta;

class ConsultaRepository
{
    public function criarConsulta(array $dados): Consulta
    {
        return Consulta::create($dados);
    }
}
