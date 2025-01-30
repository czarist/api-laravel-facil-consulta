<?php
namespace App\Http\Controllers;

use App\Http\Requests\StorePacienteRequest;
use App\Http\Requests\UpdatePacienteRequest;
use App\Services\PacienteService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    protected PacienteService $pacienteService;

    public function __construct(PacienteService $pacienteService)
    {
        $this->pacienteService = $pacienteService;
    }

    public function update(int $id, UpdatePacienteRequest $request): JsonResponse
    {
        $paciente = $this->pacienteService->update($id, $request->validated());

        return response()->json($paciente, 200);
    }

    public function store(StorePacienteRequest $request): JsonResponse
    {
        $paciente = $this->pacienteService->store($request->validated());

        return response()->json($paciente, 201);
    }

    public function list(int $medicoId, Request $request): JsonResponse
    {
        $nome            = $request->query('nome');
        $apenasAgendadas = filter_var($request->query('apenas-agendadas', false), FILTER_VALIDATE_BOOLEAN);

        $pacientes = $this->pacienteService->listarPacientesPorMedico($medicoId, $nome, $apenasAgendadas);

        return response()->json($pacientes);
    }
}
