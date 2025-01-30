<?php
namespace App\Http\Controllers;

use App\Services\CidadeService;
use Illuminate\Http\JsonResponse;

class CidadeController extends Controller
{
    protected CidadeService $cidadeService;

    public function __construct(CidadeService $cidadeService)
    {
        $this->cidadeService = $cidadeService;
    }

    /**
     * Retorna todas as cidades em formato JSON
     */
    public function index(): JsonResponse
    {
        return response()->json($this->cidadeService->listarCidades(), 200);
    }
}
