<?php

class Pokemon
{
    private string $img;
    private string $nome;
    private string $tipo;
    private string $site;

    public function retornaLinha()
    {
        $dados = "<tr>
        <td><img src='{$this->img}'></td>
        <td>{$this->nome}</td>
        <td>{$this->tipo}</td>
        <td><a href='{$this->site}'></a></td>
        </tr>";
        return $dados;
    }

    public function __construct($a, $b, $c, $d)
    {
        $this->img = $a;
        $this->nome = $b;
        $this->tipo = $c;
        $this->site = $d;
    }

    /**
     * Get the value of img
     */
    public function getImg(): string
    {
        return $this->img;
    }

    /**
     * Set the value of img
     */
    public function setImg(string $img): self
    {
        $this->img = $img;

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
     * Get the value of tipo
     */
    public function getTipo(): string
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     */
    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get the value of site
     */
    public function getSite(): string
    {
        return $this->site;
    }

    /**
     * Set the value of site
     */
    public function setSite(string $site): self
    {
        $this->site = $site;

        return $this;
    }
}
