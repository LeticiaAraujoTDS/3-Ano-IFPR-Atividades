<?php
require_once("util/Conexao.php");

$con = Conexao::getConexao();
// print_r($con)

//BUSCAR OS LIVROS JÁ SALVOS NA BASE DE DADOS

$sql = "SELECT * FROM livros";
$stm = $con->prepare($sql);
$stm->execute();
$livros = $stm->fetchAll();
// echo "<pre> " . print_r($livros, true) . "</pre>";


// verificar se o usuario já clicou em gravar

if (isset($_POST["titulo"])) {
    echo "Já clicou enviar!";

    //obter os valores digitados pelo usuario
    $titulo = $_POST["titulo"];
    $genero = $_POST["genero"];
    $paginas = $_POST["paginas"];

    // echo $titulo . " - " . $genero . " - " . $paginas;

    //inserir as informações na base de dados
    $sql = "INSERT INTO livros (titulo, genero, qtd_paginas)
        VALUES (?, ?, ?)";
    $stm = $con->prepare($sql);
    $stm->execute(array ($titulo, $genero, $paginas));
} 

?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro de livros</title>
    
</head>

<body>
    <h1>Listagem</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>TITULO</th>
            <th>GENERO</th>
            <th>PAGINAS</th>
        </tr>
        <?php foreach($livros as $l): ?>
            <tr>
                <td><?= $l["id"] ?></td>
                <td><?= $l["titulo"] ?></td>
                <td><?= $l["genero"] ?></td>
                <td><?= $l["qtd_paginas"] ?></td>
            </tr>
        <?php endforeach; ?>
        
    </table>

    <h1>Formulário</h1>

    <form action="" method="POST">

        <div style="margin-bottom: 10px;">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo">
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


</body>

</html>