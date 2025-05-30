<?php
require_once("util/Conexao.php");
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

$con = Conexao::getConexao();
// print_r($con)

//1 - BUSCAR OS LIVROS JÁ SALVOS NA BASE DE DADOS
$msgErro = "";
$sql = "SELECT * FROM livros";
$stm = $con->prepare($sql);
$stm->execute();
$livros = $stm->fetchAll();
// echo "<pre> " . print_r($livros, true) . "</pre>";


//2 - verificar se o usuario já clicou em gravar

if (isset($_POST["titulo"])) {
    // echo "Já clicou enviar!";

    //2.1 - obter os valores digitados pelo usuario
    $titulo = $_POST["titulo"];
    $genero = $_POST["genero"];
    $paginas = $_POST["paginas"];
    $autor = $_POST["autor"];

    //Back-end
    //Validar os Dados
    $erros = array();
    if (!$titulo) {
        array_push($erros, 'Informe o título!');
    } elseif(strlen($titulo) < 3 || strlen($titulo) > 50) {
        array_push($erros, 'Informe o título com no mínimo 3 e no máximo 50 caracteres!');
    }
    if (!$autor) {
        array_push($erros, 'Informe o autor!');
    }
    if (!$genero) {
        array_push($erros, 'Informe o genêro!');
    }
    if (!$paginas & $paginas != 0) {
        array_push($erros, 'Informe a quantidade de páginas!');
    } elseif ($paginas < 0 || $paginas == 0) {
        array_push($erros, 'Informe a quantidade de páginas maior que zero!');
    }

    if (count($erros) == 0) {
        // echo $titulo . " - " . $genero . " - " . $paginas;

        //2.2 - inserir as informações na base de dados
        $sql = "INSERT INTO livros (titulo, genero, qtd_paginas, autor)
        VALUES (?, ?, ?, ?)";
        $stm = $con->prepare($sql);
        $stm->execute(array($titulo, $genero, $paginas, $autor));

        // 2.3 - REDIRECIONAR PARA A MESMA PÁGINA A FIM DE LIMPAR O BUFFER DO NAVEGADOR
        //obs: PARA QU NÃO ADICIONE MAIS 1 NA LISTA TODA VEZ QUE REINICIAR A PÁGINA
        header("location: index.php");

    } else {
        $msgErro = implode("<br>", $erros);
    }
    
}

?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de livros</title>
    <style>
        * {
            background-color: lightblue;
            color: darkblue;
            border-color: #ffffff;
        }
    </style>

</head>

<body>
    <h1>Listagem</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>TITULO</th>
            <th>AUTOR</th>
            <th>GENERO</th>
            <th>PAGINAS</th>
            <th>EXCLUIR</th>
        </tr>
        <?php foreach ($livros as $l): ?>
            <tr>
                <td><?= $l["id"] ?></td>
                <td><?= $l["titulo"] ?></td>
                <td><?= $l["autor"] ?></td>
                <td>
                    <?php
                    switch ($l["genero"]) {
                        case 'D':
                            echo "Drama";
                            break;
                        case 'R':
                            echo "Romance";
                            break;
                        case 'F':
                            echo "Ficção";
                            break;
                        case 'O':
                            echo "Outros";
                            break;
                        default:
                            echo "Não foi possível obter o gênero.";
                            break;
                    } ?>
                </td>
                <td style="text-align: center;"><?= $l["qtd_paginas"] ?></td>
                <td><a style="display: flex; justify-content: center; text-decoration: none;" href='excluir.php?id=<?= $l["id"] ?>' onclick="return confirm('Confirma a exclusão?')">X</a></td>
                <!-- o return serve para avisar o confirm  que ele presica retornar uma resposta -->
            </tr>
        <?php endforeach; ?>

    </table>

    <h1>Formulário</h1>

    <!-- <form action="" method="POST" onsubmit="return validarCampos()"> -->
    <form action="" method="POST">

        <div style="margin-bottom: 10px;">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo">
        </div>
        <div style="margin-bottom: 10px;">
            <label for="autor">Autor:</label>
            <input type="text" name="autor" id="autor">
        </div>

        <div style="margin-bottom: 10px;">
            <label for="genero">Gênero:</label>
            <select type="text" name="genero" id="genero">
                <option value=""></option>
                <option value="D">Drama</option>
                <option value="F">Ficção</option>
                <option value="R">Romance</option>
                <option value="O">Outros</option>
            </select>
        </div>

        <div style="margin-bottom: 10px;">
            <label for="paginas">Número de páginas:</label>
            <input type="number" name="paginas" id="paginas">
        </div>

        <div style="margin-bottom: 10px;">
            <button type="submit">Enviar</button>
        </div>


    </form>

    <div class="erros" id="erros">
        <?= $msgErro ?>
    </div>


    <script src="./js/validacao.js"></script>

</body>

</html>