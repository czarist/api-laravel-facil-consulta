<?php
namespace App\Helpers;

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
}
