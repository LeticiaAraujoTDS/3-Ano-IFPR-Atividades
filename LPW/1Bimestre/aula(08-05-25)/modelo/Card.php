<?php

class Card
{
    private string $titulo;
    private string $diretor;
    private int $ano;
    private string $img;

    public function __construct($a, $b, $c, $d)
    {
        $this->titulo = $a;
        $this->diretor = $b;
        $this->ano = $c;
        $this->img = $d;
    }

    public function getCard()
    {
        $dados = "<div style='border: solid 1px; width: 300px; margin-top: 20px;'>";
        $dados .= "{$this->titulo}<br>";
        $dados .= "{$this->diretor}<br>";
        $dados .= "{$this->ano}<br>";
        $dados .= "<img style='width: 100%; height: auto;' src='{$this->img}' /><br>";          
        $dados .= "</div>";
        return $dados;
    }

    /**
     * Get the value of titulo
     */
    public function getTitulo(): string
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     */
    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of diretor
     */
    public function getDiretor(): string
    {
        return $this->diretor;
    }

    /**
     * Set the value of diretor
     */
    public function setDiretor(string $diretor): self
    {
        $this->diretor = $diretor;

        return $this;
    }

    /**
     * Get the value of ano
     */
    public function getAno(): int
    {
        return $this->ano;
    }

    /**
     * Set the value of ano
     */
    public function setAno(int $ano): self
    {
        $this->ano = $ano;

        return $this;
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
}
