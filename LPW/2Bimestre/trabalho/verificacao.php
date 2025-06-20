<?php

session_start();
require_once("util/Conexao.php");
require_once("modelo/Pet.php");
require_once("dao/PetDAO.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$erros = [];
$petDao = new PetDAO();

if (isset($_POST["nome"])) {
    $nome = trim($_POST['nome']);
    $raca = trim($_POST['raca']);
    $cor = trim($_POST['cor']);
    $genero = trim($_POST['genero']);
    $porte = trim($_POST['porte']);
    $foto = trim($_POST['foto']);
    $curiosidade = trim($_POST['curiosidade']);

    if (!$nome) {
        $erros[] = 'Informe o nome!';
    } elseif (strlen($nome) < 3 || strlen($nome) > 50) {
        $erros[] = 'Informe o nome com no mínimo 3 e no máximo 50 caracteres!';
    }

    if (!$raca) {
        $erros[] = 'Informe a raça!';
    }

    if (!$cor) {
        $erros[] = 'Informe a cor!';
    }

    if (!$genero) {
        $erros[] = 'Informe o gênero!';
    }

    if (!$porte) {
        $erros[] = 'Informe o porte!';
    }

    if (!$foto) {
        $erros[] = 'Informe o link da foto!';
    }

    if (!$curiosidade) {
        $erros[] = 'Informe uma curiosidade!';
    } elseif (strlen($curiosidade) < 3 || strlen($curiosidade) > 50) {
        $erros[] = 'Curiosidade deve ter entre 3 e 50 caracteres!';
    }

    if (empty($erros)) {
        $pet = new Pet($nome, $raca, $cor, $genero, $porte, $foto, $curiosidade);

        if ($petDao->Cadastar($pet)) {
            $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        } else {
            $_SESSION['msgErro'] = "Não foi possível cadastrar no banco de dados.";
        }
    } else {
        $_SESSION['msgErro'] = implode("<br>", $erros);
        $_SESSION['form_data'] = $_POST;
    }

    header("Location: index.php");
    exit();
}

if (isset($_GET["id"])) {
    $id_excluir = $_GET["id"];
    $pet = $petDao->Buscar($id_excluir);

    if (!$pet) {
        $_SESSION['msgErro'] = "Pet não existe na base de dados.";
    } else {
        if ($petDao->Excluir($id_excluir)) {
            $_SESSION['mensagem'] = "Pet " . $pet->getNome() . " excluído com sucesso.";
        } else {
            $_SESSION['msgErro'] = "Falha ao excluir o pet.";
        }
    }

    header("Location: index.php");
    exit();
}
