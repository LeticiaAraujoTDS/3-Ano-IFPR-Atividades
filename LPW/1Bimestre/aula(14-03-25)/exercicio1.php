<?php

$somaPar = 0;
$somaImpar = 0;
for ($i=20; $i < 70; $i++) { 
    if($i%2==0){
        $somaPar += $i;
    } else {
        $somaImpar += $i;
    }
}
echo "Exercício 1: <br>";
echo "Imprimindo a soma dos números ímpares entre 20 e 70: " . $somaImpar . "\n<br>";
echo "Imprimindo a soma dos números pares entre 20 e 70: " . $somaPar . "\n<br>";
