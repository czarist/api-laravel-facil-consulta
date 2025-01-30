<?php
namespace App\Http\Controllers;

use App\Services\CidadeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    protected CidadeService $cidadeService;

    public function __construct(CidadeService $cidadeService)
    {
        $this->cidadeService = $cidadeService;
    }

    public function index(Request $request): JsonResponse
    {
        $nome    = $request->query('nome');
        $cidades = $this->cidadeService->listarCidades($nome);

        return response()->json($cidades);
    }
}
