<?php

function desenhaLinha($ordem, $bandeira, $pais, $ouro, $prata, $bronze, $total)
{
    echo "<tr>";
    echo "<td>" . $ordem . "</td>";
    echo "<td><img src='" . $bandeira . "'>" . $pais . "</td>";
    echo "<td>" . $ouro . "</td>";
    echo "<td>" . $prata . "</td>";
    echo "<td>" . $bronze . "</td>";
    echo "<td>" . $total . "</td>";
    echo "</tr>";
}

echo "<h1>Lista de Medalhas nas Olímpiadas de Inverno</h1>";
echo "<table border='1'>";
echo "<tr>";
echo "<th>Ordem</th>";
echo "<th>Pais</th>";
echo "<th><img src='https://upload.wikimedia.org/wikipedia/commons/thumb/1/15/Gold_medal.svg/20px-Gold_medal.svg.png'></th>";
echo "<th><img src='https://upload.wikimedia.org/wikipedia/commons/thumb/0/03/Silver_medal.svg/20px-Silver_medal.svg.png'></th>";
echo "<th><img src='https://upload.wikimedia.org/wikipedia/commons/thumb/5/52/Bronze_medal.svg/20px-Bronze_medal.svg.png'></th>";
echo "<th><img src='https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/GoldSilverBronze_medals.svg/40px-GoldSilverBronze_medals.svg.png'></th>";
echo "</tr>";
//Cidades

$paises = array();

$pais1 = array(
    "ordem" => 1,
    "bandeira" => "https://upload.wikimedia.org/wikipedia/commons/thumb/a/a4/Flag_of_the_United_States.svg/22px-Flag_of_the_United_States.svg.png",
    "pais" => "Estados Unidos",
    "ouro" => 46,
    "prata" => 37,
    "bronze" => 38,
    "total" => 121
);
$pais2 = array(
    "ordem" => 2,
    "bandeira" =>  "https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Flag_of_the_United_Kingdom_%283-5%29.svg/22px-Flag_of_the_United_Kingdom_%283-5%29.svg.png",
    "pais" =>  "Grã-Betanha",
    "ouro" => 27,
    "prata" => 23,
    "bronze" => 17,
    "total" => 67
);
$pais3 = array(
    "ordem" => 3,
    "bandeira" => "https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Flag_of_the_People%27s_Republic_of_China.svg/22px-Flag_of_the_People%27s_Republic_of_China.svg.png",
    "pais" => "China",
    "ouro" => 26,
    "prata" => 18,
    "bronze" =>  26,
    "total" =>  70
);
$pais4 = array(
    "ordem" => 4,
    "bandeira" => "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Flag_of_Russia.svg/22px-Flag_of_Russia.svg.png",
    "pais" => "Rússia",
    "ouro" => 19,
    "prata" => 17,
    "bronze" => 20,
    "total" => 56
);
$pais5 = array(
    "ordem" => 5,
    "bandeira" => "https://upload.wikimedia.org/wikipedia/commons/thumb/b/ba/Flag_of_Germany.svg/22px-Flag_of_Germany.svg.png",
    "pais" => "Alemanha",
    "ouro" => 17,
    "prata" => 10,
    "bronze" => 15,
    "total" => 42
);

array_push($paises, $pais1);
array_push($paises, $pais2);
array_push($paises, $pais3);
array_push($paises, $pais4);
array_push($paises, $pais5);

foreach ($paises as $key => $pais) {
    echo desenhaLinha($pais["ordem"], $pais["bandeira"], $pais["pais"], $pais["ouro"], $pais["prata"], $pais["bronze"], $pais["total"]);
}

echo "</table>";
