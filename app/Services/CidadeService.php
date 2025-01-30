<?php
namespace App\Services;

use App\Repositories\CidadeRepository;
use Illuminate\Database\Eloquent\Collection;

class CidadeService
{
    protected CidadeRepository $cidadeRepository;

    public function __construct(CidadeRepository $cidadeRepository)
    {
        $this->cidadeRepository = $cidadeRepository;
    }

    public function listarCidades(?string $nome = null): Collection
    {
        return $this->cidadeRepository->listarCidades($nome);
    }
}
