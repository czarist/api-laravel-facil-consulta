<?php
namespace Database\Seeders;

use App\Models\Cidade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CidadesSeeder extends Seeder
{
    public function run()
    {
        $response = Http::get(env('API_IBGE'));

        if ($response->successful()) {
            $distritos      = $response->json();
            $totalDistritos = count($distritos);
            $contador       = 0;

            foreach ($distritos as $distrito) {
                $nome   = $distrito['nome'];
                $estado = $distrito['microrregiao']['mesorregiao']['UF']['sigla'];

                if (! Cidade::where('name', $nome)->where('estado', $estado)->exists()) {
                    Cidade::create([
                        'name'   => $nome,
                        'estado' => $estado,
                    ]);
                }

                $contador++;
                $progresso = round(($contador / $totalDistritos) * 100);

                $this->command->info("Progresso inserção de cidades: {$progresso}% ({$contador}/{$totalDistritos})");
            }

            $this->command->info('Municipios carregados com sucesso!');
        } else {
            Log::error('Erro ao consumir API do IBGE: ' . $response->status());
            $this->command->error('Erro ao consumir API do IBGE. Verifique os logs para mais detalhes.');
        }
    }
}
