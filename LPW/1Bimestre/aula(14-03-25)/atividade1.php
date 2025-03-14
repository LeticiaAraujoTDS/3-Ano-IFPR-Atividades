<?php

$cores = array("yellow","blue", "black", "green", "red", "purple", "grey", "brown");

for ($i=0; $i < 7; $i++) { 
    echo "<div style='background-color: {$cores[$i]}; width: 100px; height: 100px;'></div>";
}