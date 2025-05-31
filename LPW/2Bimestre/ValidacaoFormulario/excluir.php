<?php
require_once("util/Conexao.php");

// ini_set('display_errors',1);
// ini_set('display_startup_erros',1);
// error_reporting(E_ALL);

$con = Conexao::getConexao();
if (isset($_GET["id"])) {
    $id_excluir = $_GET["id"];

    //prepara o comando sql -> preparar a stm -> executar com array passando o parametro id -> voltar ao index
    $sql = "DELETE FROM livros WHERE id = ?;";
    $stm = $con->prepare($sql);
    $stm->execute(array($id_excluir));
    header("location: index.php");
} else {
    echo "Id do livro não informado.";
    echo "<a href='index.php' style='text-decoration: none;'>Voltar</a>";
}
