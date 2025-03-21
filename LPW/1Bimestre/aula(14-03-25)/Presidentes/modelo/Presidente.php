<?php

class Presidente
{
    private int $numero;
    private string $nome;
    private int $inicio;
    private int $fim;

    public function retornaLinha()
    {
        $dados = "<tr>
        <td>{$this->numero}</td>
        <td>{$this->nome}</td>
        <td>{$this->inicio}</td>
        <td>{$this->fim}</td>
        </tr>";
        return $dados;
    }

    public function __construct($a, $b, $c, $d)
    {
        $this->numero = $a;
        $this->nome = $b;
        $this->inicio = $c;
        $this->fim = $d;
    }


    /**
     * Get the value of numero
     */
    public function getNumero(): int
    {
        return $this->numero;
    }

    /**
     * Set the value of numero
     */
    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
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
     * Get the value of inicio
     */
    public function getInicio(): int
    {
        return $this->inicio;
    }

    /**
     * Set the value of inicio
     */
    public function setInicio(int $inicio): self
    {
        $this->inicio = $inicio;

        return $this;
    }

    /**
     * Get the value of fim
     */
    public function getFim(): int
    {
        return $this->fim;
    }

    /**
     * Set the value of fim
     */
    public function setFim(int $fim): self
    {
        $this->fim = $fim;

        return $this;
    }
}
