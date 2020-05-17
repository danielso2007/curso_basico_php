<?php

namespace app\model;

class Usuario
{

    private $nome;
    private $sobrenome;
    private $password;
    private $genero;

    public function __construct(string $nome, string $password, string $genero)
    {
        $this->validaSenha($password);
        $this->validaNomeSobrenome($nome);
        $this->genero = $genero;
    }

    public function getGenero(): string
    {
        if ($this->genero === 'M') {
            return preg_replace('/^(\w+)\b/', 'Sr.', $this->sobrenome, 1);
        } else {
            return preg_replace('/^(\w+)\b/', 'Sr.ª', $this->sobrenome, 1);
        }
    }

    public function validaNomeSobrenome(string $nome): void
    {
        $nomeSobrenome = explode(" ", trim($nome), 2);
        // var_dump($nomeSobrenome);
        if ($nomeSobrenome[0] === '') {
            $this->nome = 'Nome inválido!';
        } else {
            $this->nome = $nomeSobrenome[0];
        }
        if ($nomeSobrenome[0] === '') {
            $this->sobrenome = 'Sobrenome inválido!';
        } else {
            $this->sobrenome = $nomeSobrenome[1];
        }
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getSobrenome(): string
    {
        return $this->sobrenome;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = trim($password);
    }

    public function validaSenha(string $senha): void
    {
        $tamanhoSenha = strlen($senha);
        if ($tamanhoSenha > 6) {
            $this->password = $senha;
        } else {
            $this->password = 'Senha inválida!';
        }
    }
}
