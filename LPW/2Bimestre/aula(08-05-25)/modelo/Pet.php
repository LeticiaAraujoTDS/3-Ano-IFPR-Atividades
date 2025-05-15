<?php

class Pet
{
    private string $nome;
    private string $raca;
    private string $idade;
    private string $curiosidade;
    private string $link;

    public function __construct($a, $b, $c, $d, $e)
    {
        $this->nome = $a;
        $this->raca = $b;
        $this->idade = $c;
        $this->curiosidade = $d;
        $this->link = $e;
    }

    public function getDados()
    {
        $ds = "<div class='card w-25 p-3 bg-success-subtle shadow-sm border-0'>";
        $ds .= "<img src='{$this->link}' class='card-img-top mb-2 rounded-1' style='width: auto; height: auto;> '";
        $ds .= "<div class='card-body'>";
        $ds .= "<p class='card-text text-success-emphasis mb-2'>Nome: {$this->nome}</p><br>";
        $ds .= "<p class='card-text text-success-emphasis mb-2'>Raça: {$this->raca}</p><br>";
        $ds .= "<p class='card-text text-success-emphasis mb-2'>Idade: {$this->idade}</p><br>";
        $ds .= "<p class='card-text text-success-emphasis p-0 m-0'>Curiosidade: {$this->curiosidade}</p><br>";
        $ds .= "</div>";
        $ds .= "</div>";

        return $ds;
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
     * Get the value of idade
     */
    public function getIdade(): int
    {
        return $this->idade;
    }

    /**
     * Set the value of idade
     */
    public function setIdade(int $idade): self
    {
        $this->idade = $idade;

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

    /**
     * Get the value of link
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * Set the value of link
     */
    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }
}
