<?php

require_once("conexao.php");

class CriaClasses2 {
    private $tbBanco = "Tables_in_enderecos";
    private $con;

    function __construct()
    {
        $this->con = (new Conexao())->conectar();
    }

    function ClassesModel() {
        $sql = "SHOW TABLES";
        $query = $this->con->query($sql);
        $tabelas = $query->fetchAll(PDO::FETCH_OBJ);
        foreach ($tabelas as $tabela) {
            $nomeTabela = ucfirst($tabela->{$this->tbBanco});
            $conteudo = <<<EOT
class {$nomeTabela} {} 
EOT;
//tem que estar sem tab, sem nada para funcionar
//to falando do class e o EOT
//instalar extensao PHP
            echo "conteudo:<br><pre>$conteudo</pre><br><br>";
        }
        
    }
}

(new CriaClasses2())->ClassesModel();