<?php

require 'autoload.php';

$calculadora = new \services\Calculadora();

$notas = [9, 3, 10, 5, 10, 8];

// echo "<p>A nota de português é: $notas[0]</p>";
// echo "<p>A nota de matemática é: $notas[1]</p>";
// echo "<p>A nota de geografica é: $notas[2]</p>";
// echo "<p>A nota de história é: $notas[3]</p>";
// echo "<p>A nota de química é: $notas[4]</p>";
// echo "<p>A nota de artes é: $notas[5]</p>";

$media = $calculadora->calcularMedia($notas);

if ($media) {
    echo "<p>A média é: $media</p>";
} else {
    echo "<p>Não foi possível calcular a média.</p>";
}

$saldos = [2500, 3000, 4400, 1000, 8700, 9000];

foreach ($saldos as $saldo) {
    echo "<p>O saldo é: $saldo</p>";
}

echo '<pre>';
var_dump($saldos);

sort($saldos);

var_dump($saldos);
echo '</pre>';

echo "O menor saldo é $saldos[0].";

$nomes = "Giovanni, João, Maria, Pedro";

$arrayNomes = explode(",", $nomes);

foreach ($arrayNomes as $nome) {
    echo "<p>O nome é: $nome.</p>";
}

$nomesJuntos = implode(",", $arrayNomes);

echo "<p>Os nomes: $nomesJuntos</p>";

$correntistasEhCompras = ["Giovanni", "João", 12, "Maria", 25, "Luis", "Luisa", "12"];

echo '<pre>';
var_dump($correntistasEhCompras);

\services\ArrayUtils::remover("Giovanni", $correntistasEhCompras);

var_dump($correntistasEhCompras);
echo '</pre>';

$correntista = ["Giovanni", "João", "Maria", "Luis", "Luisa", "Raquel"];
$saldos = [2500, 3000, 4400, 1532, 8547, 1400];

$relacionados = array_merge($correntista, $saldos);

echo "<p>Relacionados:</p>";
echo "<pre>";
var_dump($relacionados);
echo "</pre>";

$relacionadosCombinados = array_combine($correntista, $saldos);

echo "<p>Combinados:</p>";
echo "<pre>";
var_dump($relacionadosCombinados);
echo "</pre>";

if (array_key_exists("João", $relacionadosCombinados)) {
    echo "O saldo do João é: {$relacionadosCombinados["João"]}";
} else {
    echo "Não foi encontrado";
}

$array_associativo = [
    "Giovanni" => 2500,
    "João" => 3000,
    "maria" => 4400
];

$maiores = \services\ArrayUtils::encontrarPessoasComSaldoMaior(3000, $array_associativo);

echo "<p>Maiores:</p>";
echo "<pre>";
var_dump($maiores);
echo "</pre>";
