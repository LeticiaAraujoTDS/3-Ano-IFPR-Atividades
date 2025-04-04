<?php

function retornaLinha($nome, $numero, $cor)
{
    $dados = "<tr style= background-color:{$cor};>
        <td>{$nome}</td>
        <td>{$numero}</td>
        </tr>";
    return $dados;
};

$j1 = array("nome" => "Tafarel", "numero" => 1);
$j2 = array("nome" => "Jorginho", "numero" => 2);
$j3 = array("nome" => "Aldair", "numero" => 13);
$j4 = array("nome" => "Márcio Santos", "numero" => 15);
$j5 = array("nome" => "Branco", "numero" => 6);
$j6 = array("nome" => "Mauro Silva", "numero" => 5);
$j7 = array("nome" => "Dunga", "numero" => 8);
$j8 = array("nome" => "Mazinho", "numero" => 17);
$j9 = array("nome" => "Zinho", "numero" => 9);
$j10 = array("nome" => "Romário", "numero" => 11);
$j11 = array("nome" => "Bebeto", "numero" => 7);

$jogadores = array($j1, $j2, $j3, $j4, $j5, $j6, $j7, $j8, $j9, $j10, $j11);

//Tabela - cabeçalho
echo "<h1>Lista de Jogadores</h1>";
echo "<table border='1'>";
echo "<tr>";
echo "<th>Número</th>";
echo "<th>Nome</th>";
echo "</tr>";

// print_r($jogadores);
foreach ($jogadores as $key => $jog) {
    if ($key % 2 == 0) {
        $cor = "lightgreen";
        echo retornaLinha($jog["nome"], $jog["numero"], $cor);
        echo "\n";
    } else {
        $cor = "yellow";
        echo retornaLinha($jog["nome"], $jog["numero"], $cor);
        echo "\n";
    }
}
