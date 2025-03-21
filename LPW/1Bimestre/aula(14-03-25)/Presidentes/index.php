<?php

require_once("./modelo/Presidente.php");

$presidente1 = new Presidente(16, "Eurico Gaspar Dutra", 1946, 1951);
$presidente2 = new Presidente(17, "Getúlio Vargas ", 1951, 1954);
$presidente3 = new Presidente(18, "Café Filho", 1954, 1955);
$presidente4 = new Presidente(19, "Carlos Luz", 1955, 1955);
$presidente5 = new Presidente(20, "Nereu Ramos", 1955, 1956);
$presidente6 = new Presidente(21, "Juscelino Kubitschek", 1956, 1961);

$presidentes = array();
array_push($presidentes, $presidente1);
array_push($presidentes, $presidente2);
array_push($presidentes, $presidente3);
array_push($presidentes, $presidente4);
array_push($presidentes, $presidente5);
array_push($presidentes, $presidente6);

//Tabela - cabeçalho
echo "<h1>Lista de Presidentes do Brasil entre 1946-1961</h1>";
echo "<table border='1'>";
echo "<tr>";
echo "<th>Número</th>";
echo "<th>Nome</th>";
echo "<th>Início</th>";
echo "<th>Fim</th>";
echo "</tr>";

//Linhas da tabela

foreach ($presidentes as $key => $p) {
    echo $p->retornaLinha();
}