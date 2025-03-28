<?php
//Forçar o php a mostrar o erro
// ini_set('display_errors',1);
// ini_set('display_startup_erros',1);
// error_reporting(E_ALL);

require_once("modelo/Pokemon.php");

$pokemon1 = new Pokemon("https://assets.pokemon.com/assets/cms2/img/pokedex/detail/001.png", "Bulbassauro", "Grama, Venenoso", "https://pokemon.fandom.com/pt-br/wiki/Bulbassauro");
$pokemon2 = new Pokemon("https://assets.pokemon.com/assets/cms2/img/pokedex/detail/004.png", "Charmander", "Fogo", "https://pokemon.fandom.com/pt-br/wiki/Charmander");
$pokemon3 = new Pokemon("https://assets.pokemon.com/assets/cms2/img/pokedex/detail/006.png", "Charizard", "Fogo, Voador", "https://pokemon.fandom.com/pt-br/wiki/Charizard");
$pokemon4 = new Pokemon("https://assets.pokemon.com/assets/cms2/img/pokedex/detail/008.png", "Wartortle", "Água", "https://pokemon.fandom.com/pt-br/wiki/Wartortle");
$pokemon5 = new Pokemon("https://assets.pokemon.com/assets/cms2/img/pokedex/detail/012.png", "Butterfree", "Inseto, Voador", "https://pokemon.fandom.com/pt-br/wiki/Butterfree");

$pokemons = array();
array_push($pokemons, $pokemon1);
array_push($pokemons, $pokemon2);
array_push($pokemons, $pokemon3);
array_push($pokemons, $pokemon4);
array_push($pokemons, $pokemon5);

//Tabela - cabeçalho
echo "<h1>Lista de Pokemons</h1>";
echo "<table border='1'>";
echo "<tr>";
echo "<th>Imagem</th>";
echo "<th>Nome</th>";
echo "<th>Tipo</th>";
echo "<th>Site</th>";
echo "</tr>";

//Linhas da tabela

foreach ($pokemons as $key => $p) {
    echo $p->retornaLinha();
}
