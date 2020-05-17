<?php

use services\Musica;
use services\Album;

require 'autoload.php';

$musicas = new SplFixedArray(2);
$musicas[0] = new Musica("One Dance");
$musicas[1] = new Musica("Closer");

$musicas->setSize(4);

$musicas[2] = new Musica("Rockstar");
$musicas[3] = new Musica("love Yourself");

$tocador = new \services\TocadorDeMusica();

$tocador->adicionarMusicas($musicas);

$tocador->tocarMusica();


$tocador->adicionarMusica(new Musica("Havana"));

$tocador->avancarMusica();

$tocador->tocarMusica();

$tocador->exibirMusicas();

$tocador->exibirQuantidadesMusicas();

echo "<br/><br/>Adicinado música nova...<br/>";

$tocador->adicionarMusicaNoComecoDaPlaylist(new Musica("Black"));

$tocador->exibirMusicas();
$tocador->exibirQuantidadesMusicas();

echo "<br/><br/>Removendo primeira música...<br/>";

$tocador->removerMusicaNoComecoDaPlaylist();

$tocador->exibirMusicas();
$tocador->exibirQuantidadesMusicas();

echo "<br/><br/>Removendo última música...<br/>";

$tocador->removerMusicaDoFinalDaPlaylist();

$tocador->exibirMusicas();
$tocador->exibirQuantidadesMusicas();

$tocador->avancarMusica();
$tocador->tocarMusica();

$tocador->avancarMusica();
$tocador->tocarMusica();

$tocador->avancarMusica();
$tocador->tocarMusica();

$tocador->tocarUltimaMusicaTocada();

$tocador->baixarMusicas();

$tocador->avancarMusica();
$tocador->tocarMusica();


$tocador->avancarMusica();
$tocador->tocarMusica();
$tocador->tocarMusica();

$tocador->avancarMusica();
$tocador->tocarMusica();

$tocador->avancarMusica();
$tocador->tocarMusica();

$tocador->exibeRanking();

$musicasDivide = new SplFixedArray(2);
$musicasDivide[0] = new Musica("Shape of You");
$musicasDivide[1] = new Musica("Castle on the Hill");

$musicasScorpion = new SplFixedArray(3);
$musicasScorpion[0] = new Musica("Peak");
$musicasScorpion[1] = new Musica("Summer Games");
$musicasScorpion[2] = new Musica("Jaded");

echo "<br/><br/><br/>SplObjectStorage:<br/><br/>";

$albuns = new SplObjectStorage();

$divide = new Album("Divide");
$albuns->attach($divide);
$scorpion = new Album("Scorpion");
$albuns->attach($scorpion);

$albuns[$divide] = $musicasDivide;
$albuns[$scorpion] = $musicasScorpion;

// echo "<pre>";
// var_dump($albuns);
// echo "</pre>";

foreach($albuns as $album) {
    echo "<br>Album: <strong>" . $album->getNome() . "</strong><br>";
    foreach($albuns[$album] as $musica) {
        echo "Musica: " . $musica->getNome() . "<br>";
    }
}
