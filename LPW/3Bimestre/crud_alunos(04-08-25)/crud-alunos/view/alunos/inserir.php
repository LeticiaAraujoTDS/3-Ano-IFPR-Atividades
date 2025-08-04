<?php
require_once(__DIR__ . "/../../model/Aluno.php");
require_once(__DIR__ . "/../../controller/AlunoController.php");

$msgErro = "";
//Receber os dados do formulario
if (isset($_POST['nome'])) {
    // se usuario já cliou em gravar
    $nome = trim($_POST['nome']) ? trim($_POST['nome']) : null;
    $idade = is_numeric($_POST['idade']) ? $_POST['idade'] : null;
    $estrangeiro = trim($_POST['estrang']) ? trim($_POST['estrang']) : null;
    $idCurso = is_numeric($_POST['curso']) ? $_POST['curso'] : null;

    //Criar um objeto ALuno para persisti-lo
    $aluno = new Aluno(); // é um objeto

    $aluno->setNome($nome);
    $aluno->setIdade($idade);
    $aluno->setEstrangeiro($estrangeiro);

    $curso = new Curso(); // é um objeto
    $curso->setId($idCurso);
    $aluno->setCurso($curso);


    //Chamar o DAO para salvar o objeto aluno
    $alunoCont = new AlunoController();
    $erros = $alunoCont->inserir($aluno);

    if (!$erros) {
        header("Location:listar.php");
    } else {
        //converter o array de erros para string
        $msgErro = implode("<br>", $erros);
    }
    
}

include_once(__DIR__ . "/form.php");
