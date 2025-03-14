<?php
function media ($a, $b, $c){
    $media = 0;
    $media += $a + $b + $c;
    $resultado = $media / 3;
    return $resultado;
}

echo "A média aritmética de 2, 3 e 4 é: " . media(2,3,4) . " .<br>";
echo "A média aritmética de 2, 4 e 6 é: " . media(2,4,6) . " .<br>";
echo "A média aritmética de 4, 6 e 8 é: " . media(4,6,8) . " .<br>";