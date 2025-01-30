<?php
namespace Database\Seeders;

use App\Helpers\Util;
use App\Models\Paciente;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PacientesSeeder extends Seeder
{
    public function run()
    {
        $response = Http::get(env('API_RANDOM_USERS'));

        if ($response->successful()) {
            $resultados     = $response->json()['results'];
            $totalPacientes = count($resultados);
            $contador       = 0;

            foreach ($resultados as $resultado) {
                $name    = $resultado['name']['title'] . '. ' . $resultado['name']['first'] . ' ' . $resultado['name']['last'];
                $cpf     = Util::generateCPF();
                $celular = $resultado['cell'];

                Paciente::create([
                    'name'    => $name,
                    'cpf'     => $cpf,
                    'celular' => $celular,
                ]);

                $contador++;
                $progresso = round(($contador / $totalPacientes) * 100);

                $this->command->info("Progresso inserção de pacientes: {$progresso}% ({$contador}/{$totalPacientes})");
            }

            $this->command->info('Seed de pacientes concluído com sucesso!');
        } else {
            Log::error('Erro ao consumir API de usuários: ' . $response->status());
            $this->command->error('Erro ao consumir API de usuários. Verifique os logs para mais detalhes.');
        }
    }
}
