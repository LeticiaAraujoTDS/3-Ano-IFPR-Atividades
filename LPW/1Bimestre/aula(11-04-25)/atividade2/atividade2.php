<?php
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

require_once("modelo/Pessoa.php");

if (isset($_GET['nome']) && isset($_GET['sobrenome']) && isset($_GET['idade']) && isset($_GET['tipo'])) {
    $nome = $_GET['nome'];
    $sobrenome = $_GET['sobrenome'];
    $idade = $_GET['idade'];
    $tipo = $_GET['tipo'];

        if ($nome != "" && $sobrenome != "" && $idade != "" && $tipo != "") {
            if ($tipo != "A" && $tipo != "C") {
                echo "O valor do parâmetro tipo precisa ser A -> array ou C -> classe!";
            } else {
                //testa se não é A e não é C
                if ($tipo == "C") {
                    $pessoa = new Pessoa($nome, $sobrenome, $idade);
                    echo $pessoa;
                } else {
                    $p = array(
                        'nome' => $nome,
                        'sobrenome' => $sobrenome,
                        'idade' => $idade
                    );

                    echo "Nome completo: " . $p["nome"] . " " . $p["sobrenome"];
                    echo "<br>";
                    echo "Idade: " . $p["idade"];
                }
            }
        } else {
            //testa se os parametros estão vazios
            echo "Um dos parâmetros está vazio!";
        }
    } else {
        //testa se os parametros foram passados
        echo "Você não passou um dos parâmetros!";
}
