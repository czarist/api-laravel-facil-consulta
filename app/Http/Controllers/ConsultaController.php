<?php
namespace App\Http\Controllers;

use App\Http\Requests\AgendarConsultaRequest;
use App\Services\ConsultaService;
use Illuminate\Http\JsonResponse;

class ConsultaController extends Controller
{
    protected ConsultaService $consultaService;

    public function __construct(ConsultaService $consultaService)
    {
        $this->consultaService = $consultaService;
    }

    public function store(AgendarConsultaRequest $request): JsonResponse
    {
        $consulta = $this->consultaService->agendarConsulta(
            $request->medico_id,
            $request->paciente_id,
            $request->data
        );

        return response()->json($consulta, 201);
    }
}
