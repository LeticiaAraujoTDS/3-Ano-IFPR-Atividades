<?php

class Pet {

    private string $id;
    private string $nome;
    private string $raca;
    private string $cor;
    private string $genero;
    private string $porte;
    private string $foto;
    private string $curiosidade;

    public function __construct($a, $b, $c, $d, $e, $f, $g, $h = 0)
    {
        $this->nome = $a;
        $this->raca = $b;
        $this->cor = $c;
        $this->genero = $d;
        $this->porte = $e;
        $this->foto = $f;
        $this->curiosidade = $g;
        $this->id = $h;
        
    }

    
    /**
     * Get the value of id
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(string $id): self
    {
        $this->id = $id;

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
     * Get the value of raca
     */
    public function getRaca(): string
    {
        return $this->raca;
    }

    /**
     * Set the value of raca
     */
    public function setRaca(string $raca): self
    {
        $this->raca = $raca;

        return $this;
    }

    /**
     * Get the value of cor
     */
    public function getCor(): string
    {
        return $this->cor;
    }

    /**
     * Set the value of cor
     */
    public function setCor(string $cor): self
    {
        $this->cor = $cor;

        return $this;
    }

    /**
     * Get the value of genero
     */
    public function getGenero(): string
    {
        return $this->genero;
    }

    /**
     * Set the value of genero
     */
    public function setGenero(string $genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get the value of porte
     */
    public function getPorte(): string
    {
        return $this->porte;
    }

    /**
     * Set the value of porte
     */
    public function setPorte(string $porte): self
    {
        $this->porte = $porte;

        return $this;
    }

    /**
     * Get the value of foto
     */
    public function getFoto(): string
    {
        return $this->foto;
    }

    /**
     * Set the value of foto
     */
    public function setFoto(string $foto): self
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get the value of curiosidade
     */
    public function getCuriosidade(): string
    {
        return $this->curiosidade;
    }

    /**
     * Set the value of curiosidade
     */
    public function setCuriosidade(string $curiosidade): self
    {
        $this->curiosidade = $curiosidade;

        return $this;
    }
}