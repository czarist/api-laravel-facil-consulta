<?php
namespace Database\Seeders;

use App\Models\Consulta;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class ConsultasSeeder extends Seeder
{
    public function run()
    {
        $medicos   = Medico::pluck('id')->toArray();
        $pacientes = Paciente::select('id', 'created_at')->get();

        if (empty($medicos) || $pacientes->isEmpty()) {
            Log::warning('Não há médicos ou pacientes cadastrados. O seeder de consultas não pode ser executado.');
            $this->command->warn('Não há médicos ou pacientes cadastrados. O seeder de consultas não pode ser executado.');
            return;
        }

        $totalConsultas = 2401;
        $contador       = 0;

        for ($i = 0; $i < $totalConsultas; $i++) {
            $medicoId   = $medicos[array_rand($medicos)];
            $paciente   = $pacientes->random();
            $pacienteId = $paciente->id;
            $createdAt  = $paciente->created_at;

            $dataConsulta = fake()->dateTimeBetween($createdAt, 'now');

            Consulta::create([
                'medico_id'   => $medicoId,
                'paciente_id' => $pacienteId,
                'data'        => $dataConsulta,
            ]);

            $contador++;
            $progresso = round(($contador / $totalConsultas) * 100);

            $this->command->info("Progresso inserção de consultas: {$progresso}% ({$contador}/{$totalConsultas})");
        }

        $this->command->info('Seed de consultas concluído com sucesso!');
    }
}
