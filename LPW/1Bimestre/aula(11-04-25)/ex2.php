<?php


echo "Por GET:";
echo "<br>";

$num1 = $_GET['num1'];
$num2 = $_GET['num2'];
$num3 = $_GET['num3'];
$soma = $num1 + $num2 + $num3;

echo $num1 . " + " . $num2 . " + " . $num3 . " = " . $soma;
echo "<br>";

$divisao = $soma / 3;
echo "Média Aritmética: " . $divisao;
echo "<br>";

echo "Por POST:";
echo "<br>";

$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$num3 = $_POST['num3'];
$soma = $num1 + $num2 + $num3;

echo $num1 . " + " . $num2 . " + " . $num3 . " = " . $soma;
echo "<br>";

$divisao = $soma / 3;
echo "Média Aritmética: " . $divisao;