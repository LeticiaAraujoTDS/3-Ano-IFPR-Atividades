<?php
require_once(__DIR__ . "/../../model/Aluno.php");
require_once(__DIR__ . "/../../controller/AlunoController.php");
    
//Receber os dados do formulario
    if (isset($_POST['nome'])) {
        // se usuario já cliou em gravar
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];
        $estrangeiro = $_POST['estrang'];
        $idCurso = $_POST['curso'];

        //Criar um objeto ALuno para persisti-lo
        
        // require_once(__DIR__ . "/../../model/Curso.php"); já está no aluno então é opcional chmar aqui, pois está chamando no aluno

        $aluno = new Aluno(); // é um objeto
        
        $aluno->setNome($nome);
        $aluno->setIdade($idade);
        $aluno->setEstrangeiro($estrangeiro);

        $curso = new Curso(); // é um objeto
        $curso->setId($idCurso);
        $aluno->setCurso($curso);

        //print_r($aluno);

        //Chamar o DAO para salvar o objeto aluno
        $alunoCont = new AlunoController();
        $alunoCont->inserir($aluno);
        header("Location:listar.php");
    }

    include_once(__DIR__ . "/form.php");
?>