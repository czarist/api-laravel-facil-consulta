<?php
namespace App\Repositories;

use App\Helpers\Util;
use App\Models\Medico;
use Illuminate\Database\Eloquent\Collection;

class MedicoRepository
{
    public function listarMedicos(?string $name = null): Collection
    {
        $query = Medico::with(['cidade:id,name,estado'])
            ->select('id', 'name', 'especialidade', 'cidade_id')
            ->orderBy('name', 'asc');

        return Util::filtrarPorNome($query, $name)->get();
    }

    public function listarMedicosPorCidade(int $cidadeId, ?string $name = null): Collection
    {
        $query = Medico::where('cidade_id', $cidadeId)
            ->select('id', 'name', 'especialidade')
            ->orderBy('name', 'asc');

        return Util::filtrarPorNome($query, $name)->get();
    }

    public function store(array $data): Medico
    {
        return Medico::create($data);
    }

}
