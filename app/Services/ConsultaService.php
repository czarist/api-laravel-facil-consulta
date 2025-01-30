<?php
namespace App\Services;

use App\Models\Consulta;
use App\Repositories\ConsultaRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ConsultaService
{
    protected ConsultaRepository $consultaRepository;

    public function __construct(ConsultaRepository $consultaRepository)
    {
        $this->consultaRepository = $consultaRepository;
    }

    public function agendarConsulta(int $medicoId, int $pacienteId, string $data): Consulta
    {
        if (Auth::id() !== $pacienteId) {
            throw ValidationException::withMessages([
                'paciente_id' => 'Você só pode agendar consultas para sua própria conta.',
            ]);
        }

        return $this->consultaRepository->criarConsulta([
            'medico_id'   => $medicoId,
            'paciente_id' => $pacienteId,
            'data'        => $data,
        ]);
    }
}
