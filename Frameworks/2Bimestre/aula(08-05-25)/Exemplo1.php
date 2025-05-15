<?php


$diretorio="php";
$arquivo=$diretorio.'/arquivo.php';
if(!file_exists($diretorio)){
    if(mkdir($diretorio, 0777, true)){
        echo "Erro: Diretório " . $diretorio . " não criado.\n";
    } else{
        echo "Diretório " . $diretorio . " criado com sucesso.\n";
    }
    // file_put_contents("classe.php", "Texto para conteúdo",);
}
else{
    echo "\nO diretório " . $diretorio . " já foi criado.\n";
}
// var = <<<(qualquer palavra limitadora)
//(palavra escolhida);

$x = "'Olá mundo!'";
$conteudo = <<<PHP
    <?php
        class Teste{
            function __construct(){
                echo $x;
            }
        }
        new Teste();
PHP;

if(file_put_contents($arquivo, $conteudo)===false){
    echo "Erro: Nã foi possível criar o arquivo.";
} else{
    echo $arquivo . " foi criado.\n";
}