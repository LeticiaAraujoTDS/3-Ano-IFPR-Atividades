<?php

require_once(__DIR__ . "/../dao/AlunoDAO.php");

class AlunoController{

    private AlunoDAO $alunoDAO;

    public function __construct() {

        $this->alunoDAO = new AlunoDAO;
    }
    public function inserir(Aluno $aluno) {
        return $this->alunoDAO->inserir($aluno);
    }

    public function listar(){
        return $this->alunoDAO->listar();
    }
}