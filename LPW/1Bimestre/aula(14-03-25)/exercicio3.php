<?php
$matriz = array();

$ret1 = array("base" => 10, "altura" => 20);
$ret2 = array("base" => 12, "altura" => 22);
$ret3 = array("base" => 15, "altura" => 25);

$rets = array($ret1, $ret2, $ret3);
echo area($rets);

function area(array $a){
    $area = 0;
    foreach ($a as $num => $array) {
        $area = $array["base"] * $array["altura"];
        print "Área do retângulo ". $num + 1 . ": " . $area . "<br>";
    }

}