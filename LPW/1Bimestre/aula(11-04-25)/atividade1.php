<?php

if (isset($_GET['n1']) && isset($_GET['n2'])) {
    $a = $_GET['n1'];
    $b = $_GET['n2'];
    if ($a != "" && $b != "") {

        $soma = $a + $b;
        echo "Soma = " . $soma;
        echo "<br>";
        $sub = $a - $b;
        echo "Subtração = " . $sub;
        echo "<br>";
        $mult = $a * $b;
        echo "Multiplicação = " . $mult;
        echo "<br>";
        $div = $a / $b;
        echo "Divisão = " . $div;
        echo "<br>";
        $res = $a % $b;
        echo "Resto da divisão = " . $res;
        echo "<br>";
    } else {
        echo "<h1>Um dos valores está vazio, passe o valor do número!</h1>";
        echo "<br>";
    }
} else {
    echo "<h1>Você não passou um dos valores, verifique os parâmetros n1 e n2!</h1>";
    echo "<br>";
}
