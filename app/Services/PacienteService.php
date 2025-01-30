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

    public function atualizarPaciente(int $id, array $dados): Paciente
    {
        return $this->pacienteRepository->atualizarPaciente($id, $dados);
    }

    public function listarPacientesPorMedico(int $medicoId, ?string $nome = null, ?bool $apenasAgendadas = null): Collection
    {
        return $this->pacienteRepository->listarPacientesPorMedico($medicoId, $nome, $apenasAgendadas);
    }
}
