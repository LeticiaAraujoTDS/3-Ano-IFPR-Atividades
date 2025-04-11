<?php

class Pessoa
{
    private string $nome;
    private string $sobrenome;
    private string $idade;

    public function __construct($a, $b, $c)
    {
        $this->nome = $a;
        $this->sobrenome = $b;
        $this->idade = $c;
    }

    public function __toString()
    {
        $dados = "Nome completo: " . $this->nome . " " . $this->sobrenome;
        $dados .= "<br>Idade: " . $this->idade;
        return $dados;
    }
    /**
     * Get the value of nome
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of sobrenome
     */
    public function getSobrenome(): string
    {
        return $this->sobrenome;
    }

    /**
     * Set the value of sobrenome
     */
    public function setSobrenome(string $sobrenome): self
    {
        $this->sobrenome = $sobrenome;

        return $this;
    }

    /**
     * Get the value of idade
     */
    public function getIdade(): string
    {
        return $this->idade;
    }

    /**
     * Set the value of idade
     */
    public function setIdade(string $idade): self
    {
        $this->idade = $idade;

        return $this;
    }
}
