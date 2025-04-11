<?php

echo "Soma dos números por GET:";
echo "<br>";

$num1 = $_GET['num1'];
$num2 = $_GET['num2'];
$total = $num1 + $num2;

echo $num1 . " + " . $num2 . " = " . $total;
echo "<br>";

echo "Soma dos números por POST:";
echo "<br>";


$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$total = $num1 + $num2;

echo $num1 . " + " . $num2 . " = " . $total;

