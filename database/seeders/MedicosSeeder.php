<?php
namespace Database\Seeders;

use App\Models\Cidade;
use App\Models\Medico;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MedicosSeeder extends Seeder
{
    public function run()
    {
        $especialidades = [
            'Cardiologista', 'Pediatra', 'Dermatologista', 'Ortopedista',
            'Neurologista', 'Psiquiatra', 'Oftalmologista', 'Ginecologista',
            'Oncologista', 'Endocrinologista', 'Nefrologista', 'Geriatra',
            'Urologista', 'Infectologista', 'Reumatologista', 'Hematologista',
            'Cirurgião', 'Otorrinolaringologista', 'Gastroenterologista', 'Anestesiologista',
        ];

        $response = Http::get(env('API_RANDOM_USERS'));

        if ($response->successful()) {
            $resultados   = $response->json()['results'];
            $cidades      = Cidade::pluck('id')->toArray();
            $totalMedicos = count($resultados);
            $contador     = 0;

            foreach ($resultados as $resultado) {
                $title         = $resultado['gender'] == 'female' ? 'Dra' : 'Dr';
                $name          = $title . '. ' . $resultado['name']['first'] . ' ' . $resultado['name']['last'];
                $especialidade = $especialidades[array_rand($especialidades)];
                $cidadeId      = $cidades[array_rand($cidades)];

                Medico::create([
                    'name'          => $name,
                    'especialidade' => $especialidade,
                    'cidade_id'     => $cidadeId,
                ]);

                $contador++;
                $progresso = round(($contador / $totalMedicos) * 100);

                $this->command->info("Progresso inserção de médicos: {$progresso}% ({$contador}/{$totalMedicos})");
            }

            $this->command->info('Seed de médicos concluído com sucesso!');
        } else {
            Log::error('Erro ao consumir API de usuários: ' . $response->status());
            $this->command->error('Erro ao consumir API de usuários. Verifique os logs para mais detalhes.');
        }
    }
}
