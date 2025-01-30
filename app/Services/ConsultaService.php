<?php
namespace App\Services;

use App\Models\Consulta;
use App\Repositories\ConsultaRepository;

class ConsultaService
{
    protected ConsultaRepository $consultaRepository;

    public function __construct(ConsultaRepository $consultaRepository)
    {
        $this->consultaRepository = $consultaRepository;
    }

    public function agendarConsulta(int $medicoId, int $pacienteId, string $data): Consulta
    {
        return $this->consultaRepository->criarConsulta([
            'medico_id'   => $medicoId,
            'paciente_id' => $pacienteId,
            'data'        => $data,
        ]);
    }
}
