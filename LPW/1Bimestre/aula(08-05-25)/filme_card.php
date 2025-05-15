<?php

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

require_once("modelo/Card.php");

$titulo = $_POST["titulo"];
$diretor = $_POST["diretor"];
$ano = $_POST["ano"];
$imagem = $_POST["img"];

$card = new Card($titulo, $diretor, $ano, $imagem);
echo $card->getCard();

echo "<a href='filme_form.html'>Clique aqui para voltar.</a>";