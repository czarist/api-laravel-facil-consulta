<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;

class CidadeService
{
    /**
     * Retorna a lista de todas as cidades usando SQL puro
     */
    public function listarCidades()
    {
        return DB::select("SELECT id, name, estado FROM cidades ORDER BY name ASC");
    }
}
