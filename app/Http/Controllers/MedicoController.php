<?php
namespace App\Http\Controllers;

use App\Services\MedicoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    protected MedicoService $medicoService;

    public function __construct(MedicoService $medicoService)
    {
        $this->medicoService = $medicoService;
    }

    public function index(Request $request): JsonResponse
    {
        $nome    = $request->query('nome');
        $medicos = $this->medicoService->listarMedicos($nome);

        return response()->json($medicos);
    }

    public function listarPorCidade(int $cidadeId, Request $request): JsonResponse
    {
        $nome    = $request->query('nome');
        $medicos = $this->medicoService->listarMedicosPorCidade($cidadeId, $nome);

        return response()->json($medicos);
    }
}
