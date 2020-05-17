<?php

declare(strict_types=1);

namespace services;

use SplDoublyLinkedList;
use SplFixedArray;
use SplQueue;
use SplStack;

class TocadorDeMusica
{

    private $musicas;
    private $historico;
    private $filaDeDownloads;

    public function __construct()
    {
        $this->musicas = new SplDoublyLinkedList();
        $this->historico = new SplStack();
        $this->filaDeDownloads = new SplQueue();
        $this->musicas->rewind();
        $this->ranking = new Ranking();
    }

    public function adicionarMusicas(SplFixedArray $musicas): void
    {
        for ($musicas->rewind(); $musicas->valid(); $musicas->next()) {
            $this->adicionarMusica($musicas->current());
        }
        $this->musicas->rewind();
    }

    public function adicionarMusica($musica): void
    {
        $this->musicas->push($musica);
    }

    public function avancarMusica(): void
    {
        $this->musicas->next();
        if (!$this->musicas->valid()) {
            $this->musicas->rewind();
        }
    }

    public function voltarMusica()
    {
        $this->musicas->prev();

        if (!$this->musicas->valid()) {
            $this->musicas->rewind();
        }
    }

    public function tocarMusica(): void
    {
        if ($this->musicas->count() === 0) {
            echo "Erro, nenhuma música no Tocador";
        } else {
            $this->musicas->current()->tocar();
            $this->historico->push($this->musicas->current());
        }
    }

    public function tocarUltimaMusicaTocada()
    {
        echo "<br/> Última música tocada: <b>" . $this->historico->pop() . "</b><br/>";
    }

    public function exibirMusicas(): void
    {
        for ($this->musicas->rewind(); $this->musicas->valid(); $this->musicas->next()) {
            echo  "Música: " . $this->musicas->current() . "<br/>";
        }
    }

    public function exibirQuantidadesMusicas(): void
    {
        echo  "Existem " . $this->musicas->count() . " músicas no tocador.";
    }

    public function adicionarMusicaNoComecoDaPlaylist($musica): void
    {
        $this->musicas->unshift($musica);
    }

    public function removerMusicaNoComecoDaPlaylist(): void
    {
        $this->musicas->shift();
    }

    public function removerMusicaDoFinalDaPlaylist(): void
    {
        $this->musicas->pop();
    }

    public function baixarMusicas()
    {
        if ($this->musicas->count() > 0) {
            for ($this->musicas->rewind(); $this->musicas->valid(); $this->musicas->next()) {
                echo "Adicionando para download: " . $this->musicas->current() . "<br/>";
                $this->filaDeDownloads->push($this->musicas->current());
            }

            for ($this->filaDeDownloads->rewind(); $this->filaDeDownloads->valid(); $this->filaDeDownloads->next()) {
                echo "Baixando " . $this->filaDeDownloads->current() . "...<br/>";
            }
        } else {
            echo "<br/>Nenhuma música encontrada para baixar.<br/>";
        }
    }

    public function exibeRanking()
    {
        foreach ($this->musicas as $musica) {
            $this->ranking->insert($musica);
        }
        foreach ($this->ranking as $musica) {
            echo $musica->getNome() . " - " . $musica->getVezesTocada() . "<br>";
        }
    }
}
