<?php

$cidade1 = array(
    "nome" => 'Foz do Iguaçu',
    "habitantes" => 250.000,
    "area" => '500km2',
    "altitude" => '145m',
    "estado" => 'Paraná-PR'
);

$cidade2 = array(
    "nome" => 'Foz do Iguaçu',
    "habitantes" => 250.000,
    "area" => '500km2',
    "altitude" => '145m',
    "estado" => 'Paraná-PR'
);

$cidade3 = array(
    "nome" => 'Foz do Iguaçu',
    "habitantes" => 250.000,
    "area" => '500km2',
    "altitude" => '145m',
    "estado" => 'Paraná-PR'
);

$cidade4 = array(
    "nome" => 'Foz do Iguaçu',
    "habitantes" => 250.000,
    "area" => '500km2',
    "altitude" => '145m',
    "estado" => 'Paraná-PR'
);

$cidade5 = array(
    "nome" => 'Foz do Iguaçu',
    "habitantes" => 250.000,
    "area" => '500km2',
    "altitude" => '145m',
    "estado" => 'Paraná-PR'
);

$cidades = array($cidade1, $cidade2, $cidade3, $cidade4, $cidade5);

foreach ($cidades as $cidade) {
    print "<table>
    <tr>
      <th>Nome</th>
      <th>Habitantes</th>
      <th>Área</th>
      <th>Altitude</th>
      <th>Estado</th>
    </tr>
    <tr>
      <td>$cidade[nome]</td>
      <td>$cidade[habitantes]</td>
      <td>$cidade[area]</td>
      <td>$cidade[altitude]</td>
      <td>$cidade[estado]</td>
    </tr>
  </table>";
}
