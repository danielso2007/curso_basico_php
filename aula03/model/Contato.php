<?php

namespace app\model;

class Contato
{

    private $email;
    private $endereco;
    private $cep;

    public function __construct(string $email, string $endereco, string $cep, string $telefone)
    {
        $this->endereco = trim($endereco);
        $this->cep = trim($cep);
        $this->validaTelefone(trim($telefone));
        $this->validaEmail($email);
    }

    public function getUsuario(): string
    {
        if (strpos($this->email, "@") === false) {
            return 'Usuário inválido!';
        } else {
            return substr($this->email, 0, strpos($this->email, "@"));
        }
    }

    public function setEmail(string $email)
    {
        $this->email = trim($email);
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    private function validaEmail(string $email): void
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
            $this->setEmail($email);
        } else {
            $this->setEmail("E-mail inválido!");
        }
    }

    public function getEndereco(): string
    {
        return implode(" - ", [$this->endereco, $this->cep]);
    }

    public function getCep(): string
    {
        return $this->cep;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function setTelefone(string $telefone): void
    {
        $this->telefone = $telefone;
    }

    private function validaTelefone(string $telefone): void {
        if (preg_match('/^[0-9]{4}-[0-9]{4}$/', $telefone, $encotrados)) {
            $this->setTelefone($telefone);
        } else {
            $this->setTelefone("Telefone inválido!");
        }
    }
}
