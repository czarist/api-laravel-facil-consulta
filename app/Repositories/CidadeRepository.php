<?php
namespace App\Repositories;

use App\Models\Cidade;
use Illuminate\Database\Eloquent\Collection;

class CidadeRepository
{
    public function listarCidades(?string $nome = null): Collection
    {
        $query = Cidade::select('id', 'name', 'estado')->orderBy('name', 'asc');

        if (! empty($nome)) {
            $query->where('name', 'LIKE', "%$nome%");
        }

        return $query->get();
    }
}
