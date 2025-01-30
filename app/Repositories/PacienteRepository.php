<?php
namespace App\Repositories;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PacienteRepository
{

    public function encontrarPorId(int $id): Paciente
    {
        $paciente = Paciente::find($id);

        if (! $paciente) {
            throw new ModelNotFoundException("Paciente não encontrado.");
        }

        return $paciente;
    }

    public function atualizarPaciente(int $id, array $dados): Paciente
    {
        $paciente = $this->encontrarPorId($id);

        $paciente->update($dados);
        return $paciente;
    }

    public function listarPacientesPorMedico(int $medicoId, ?string $nome = null, ?bool $apenasAgendadas = null): Collection
    {
        $query = Paciente::with([
            'consultas' => function ($query) use ($medicoId, $apenasAgendadas) {
                $query->where('medico_id', $medicoId)
                    ->orderBy('data', 'asc')
                    ->select('id', 'paciente_id', 'data');

                if ($apenasAgendadas) {
                    $query->where('data', '>=', now());
                }
            },
            'consultas.medico',
        ])
            ->whereHas('consultas', function ($query) use ($medicoId) {
                $query->where('medico_id', $medicoId);
            });

        if (! empty($nome)) {
            $query->where('name', 'LIKE', "%$nome%");
        }

        $pacientes = $query->get();

        return new Collection($pacientes->map(fn(Paciente $paciente) => $this->formatarPacienteComConsultas($paciente)));
    }

    private function formatarPacienteComConsultas(Paciente $paciente): array
    {
        return [
            'id'        => $paciente->id,
            'name'      => $paciente->name,
            'celular'   => $paciente->celular,
            'cpf'       => $paciente->cpf,
            'consultas' => $paciente->consultas->map(fn($consulta) => [
                'consulta_id'   => $consulta->id,
                'consulta_data' => $consulta->data,
            ]),
        ];
    }
}
