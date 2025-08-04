<?php

require_once(__DIR__ . "/../dao/AlunoDAO.php");

class AlunoController{

    private AlunoDAO $alunoDAO;

    public function __construct() {

        $this->alunoDAO = new AlunoDAO;
    }
    public function inserir(Aluno $aluno) {
        $erros = array();

        $erro = $this->alunoDAO->inserir($aluno);
        if ($erro) {
            array_push($erros, "Erro ao salvar o aluno.");
            if (AMB_DEV) {
                array_push($erros, $erro);
            }
        } 
        return $erros;
    }

    public function listar(){
        return $this->alunoDAO->listar();
    }
}