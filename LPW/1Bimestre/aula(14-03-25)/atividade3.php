<?php

$nomes = array("Foz do Iguaçu", "Cascavel", "Chapecó", "Blumenau", "Curitiba");
$habi = array(250.000, 300.000, 240.000, 330.000, 1500.000);
$area = array("500km²", "420km²", "120km²", "200km²", "300km²");
$alt = array("145m", "320m", "620m", "85m", "850m");
$est = array("Paraná-PR", "Paraná-PR", "Santa Catarina-SC", "Santa Catarina-SC", "Paraná-PR");
$tit = 
$matriz = array($nomes, $habi, $area, $alt, $est);

echo "<div> 
    <table>Tabela</table>
        <tr>
        <?php
        $tr = array('Nome', 'Habitantes', 'Área', 'Altitude', 'Estado');
        </tr>
    </div>";