<?php
namespace App\Repositories;

use App\Models\Medico;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class MedicoRepository
{
    public function listarMedicos(?string $name = null): Collection
    {
        $query = Medico::with(['cidade:id,name,estado'])
            ->select('id', 'name', 'especialidade', 'cidade_id')
            ->orderBy('name', 'asc');

        return $this->filtrarPorNome($query, $name)->get();
    }

    public function listarMedicosPorCidade(int $cidadeId, ?string $name = null): Collection
    {
        $query = Medico::where('cidade_id', $cidadeId)
            ->select('id', 'name', 'especialidade')
            ->orderBy('name', 'asc');

        return $this->filtrarPorNome($query, $name)->get();
    }

    private function filtrarPorNome(Builder $query, ?string $name): Builder
    {
        if (! empty($name)) {
            $nameLimpo = $this->limparNomePrefixo($name);
            $query->whereRaw("LOWER(name) LIKE LOWER(?)", ["%$nameLimpo%"]);
        }
        return $query;
    }

    private function limparNomePrefixo(string $name): string
    {
        return preg_replace('/\b\w+\.\s*/', '', $name) ?? $name;
    }

    public function store(array $data): Medico
    {
        return Medico::create($data);
    }

}
