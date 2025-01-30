<?php
namespace App\Services;

use App\Models\Paciente;
use App\Repositories\PacienteRepository;
use Illuminate\Database\Eloquent\Collection;

class PacienteService
{
    protected PacienteRepository $pacienteRepository;

    public function __construct(PacienteRepository $pacienteRepository)
    {
        $this->pacienteRepository = $pacienteRepository;
    }

    public function update(int $id, array $dados): Paciente
    {
        return $this->pacienteRepository->update($id, $dados);
    }

    public function listarPacientesPorMedico(int $medicoId, ?string $nome = null, ?bool $apenasAgendadas = null): Collection
    {
        return $this->pacienteRepository->listarPacientesPorMedico($medicoId, $nome, $apenasAgendadas);
    }

    public function store(array $dados): Paciente
    {
        return $this->pacienteRepository->store($dados);
    }
}
