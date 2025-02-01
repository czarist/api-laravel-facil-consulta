<?php
namespace App\Helpers;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Builder;

class Util
{

    public static function generateCPF(): string
    {
        $cpf = [];
        for ($i = 0; $i < 9; $i++) {
            $cpf[] = random_int(0, 9);
        }

        $cpf[] = self::calculateCPFVerifier($cpf);

        $cpf[] = self::calculateCPFVerifier($cpf);

        return implode('', $cpf);
    }

    private static function calculateCPFVerifier(array $cpf): int
    {
        $multiplicador = count($cpf) + 1;
        $soma          = 0;

        foreach ($cpf as $numero) {
            $soma += $numero * $multiplicador--;
        }

        $resto = $soma % 11;

        return $resto < 2 ? 0 : 11 - $resto;
    }

    public static function filtrarPorNome(Builder $query, ?string $name): Builder
    {
        if (! empty($name)) {
            $nameLimpo = self::limparNomePrefixo($name);
            $query->whereRaw("LOWER(name) LIKE LOWER(?)", ["%$nameLimpo%"]);
        }
        return $query;
    }

    private static function limparNomePrefixo(string $name): string
    {
        $nameLimpo = preg_replace('/^(mr|mrs|ms|miss|dr|dra|sr|sra|srta|prof|eng|dout)\.?(\s+)/i', '', $name) ?? '';

        return trim($nameLimpo);
    }

    public static function formatarPacienteComConsultas(Paciente $paciente): array
    {
        return [
            'id'        => $paciente->id,
            'name'      => $paciente->name,
            'celular'   => $paciente->celular,
            'cpf'       => $paciente->cpf,
            'consultas' => $paciente->consultas->map(fn($consulta) => [
                'consulta_id'   => $consulta->id,
                'consulta_data' => $consulta->data,
            ]),
        ];
    }

}
