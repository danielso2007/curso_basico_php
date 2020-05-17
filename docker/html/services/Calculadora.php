<?php

namespace services;

class Calculadora
{
    public function calcularMedia(array $notas): ?float
    {
        $quantidadeDeNotas = sizeof($notas);

        if ($quantidadeDeNotas > 0) {
            $soma = 0;
            for ($i = 0; $i < $quantidadeDeNotas; $i++) {
                $soma += $notas[$i];
            }

            $media = $soma / $quantidadeDeNotas;

            // echo "<p>A médoa é: $media</p>";
            return $media;
        } else {
            // echo "<p>Não foi possível calcular a média.</p>";
            return null;
        }
    }

}
