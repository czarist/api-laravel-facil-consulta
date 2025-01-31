<?php
namespace App\Services;

use App\Repositories\MedicoRepository;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Medico;

class MedicoService
{
    protected MedicoRepository $medicoRepository;

    public function __construct(MedicoRepository $medicoRepository)
    {
        $this->medicoRepository = $medicoRepository;
    }

    public function listarMedicos(?string $name = null): Collection
    {
        return $this->medicoRepository->listarMedicos($name);
    }

    public function listarMedicosPorCidade(int $cidadeId, ?string $name = null): Collection
    {
        return $this->medicoRepository->listarMedicosPorCidade($cidadeId, $name);
    }

    public function store(array $data): Medico
    {
        return $this->medicoRepository->store($data);
    }

}
