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

function BuscarLivro(string $nome)
{
    $con = Conexao::getConexao();
    $sql = "SELECT titulo FROM livros WHERE titulo = ?";
    $stm = $con->prepare($sql);
    $stm->execute(array($nome));
    $livro = $stm->fetchAll();
    return $livro;
}
// echo "<pre> " . print_r($livros, true) . "</pre>";
//2 - verificar se o usuario já clicou em gravar
$titulo =  "";
$genero = "";
$paginas = "";
$autor = "";
if (isset($_POST["titulo"])) {
    //2.1 - obter os valores digitados pelo usuario
    $titulo = trim($_POST["titulo"]);
    $genero = $_POST["genero"];
    $paginas = $_POST["paginas"];
    $autor = trim($_POST["autor"]);
    //o trim tira o espaço em branco do inicio e o fim, e não o do meio
    //o str_replace tira tudo que eu passo como primeiro parametro pelo segundo

    //Back-end
    //Validar os Dados
    $erros = array();
    if (!$titulo) {
        array_push($erros, 'Informe o título!');
    } elseif (strlen($titulo) < 3 || strlen($titulo) > 50) {
        array_push($erros, 'Informe o título com no mínimo 3 e no máximo 50 caracteres!');
    }
    if (!$autor) {
        array_push($erros, 'Informe o autor!');
    } elseif (strlen($autor) <= 3) {
        array_push($erros, 'Informe o autor com no mínimo 3 caracteres!');
    }
    if (!$genero) {
        array_push($erros, 'Informe o genêro!');
    }
    if ($paginas == "") {
        array_push($erros, 'Informe a quantidade de páginas!');
    } elseif ($paginas <= 0) {
        array_push($erros, 'Informe a quantidade de páginas maior que zero!');
    }

    //Buscar no Banco de dados se o título já foi cadastrado
    if (count(BuscarLivro($titulo)) == 0) {
        if (count($erros) == 0) {
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
    } else {
        $erros = array();
        array_push($erros, "Voce ja registrou este livro!");
        $msgErro = implode("<br>", $erros);
    }
}

?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Cadastro de livros</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cousine:ital,wght@0,400;0,700;1,400;1,700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

        body {
            color: darkblue;
            font-family: "Montserrat", sans-serif;
        }

        table,
        th,
        td {
            border-color: #ffffff !important;
        }

        #botao:hover {
            border: 1px red solid;
            color: red;
            background-color: transparent;
            transition: all 0.8s;
        }
    </style>
</head>

<body class="bg-danger-subtle text-danger-emphasis">
    <div class="container py-5">

        <h1 class="mb-4 text-center">Listagem</h1>

        <div class="card p-2 mx-auto mb-3 bg-light" style="max-width: 80%;">


            <table class="table table-bordered rounded-1 table-striped text-center align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>TÍTULO</th>
                        <th>AUTOR</th>
                        <th>GÊNERO</th>
                        <th>PÁGINAS</th>
                        <th>EXCLUIR</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($livros as $l): ?>
                        <tr>
                            <td><?= $l["id"] ?></td>
                            <td class="text-start px-4"><?= $l["titulo"] ?></td>
                            <td class="text-start px-4"><?= $l["autor"] ?></td>
                            <td class="text-start px-4">
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
                            <td><?= $l["qtd_paginas"] ?></td>
                            <td>
                                <a id="botao" class="btn btn-danger btn-sm" href='excluir.php?id=<?= $l["id"] ?>' onclick="return confirm('Confirma a exclusão?')"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
</svg></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <h1 class="mb-4 text-center">Formulário</h1>

        <div class="card bg-light p-4 mx-auto " style="max-width: 80%;">
            <form action="" method="POST">

                <div class="mb-3">
                    <label for="titulo" class="form-label">Título:</label>
                    <input type="text" name="titulo" id="titulo" class="form-control" value="<?= $titulo ?>">
                </div>

                <div class="mb-3">
                    <label for="autor" class="form-label">Autor:</label>
                    <input type="text" name="autor" id="autor" class="form-control" value="<?= $autor ?>">
                </div>

                <div class="mb-3">
                    <label for="genero" class="form-label">Gênero:</label>
                    <select name="genero" id="genero" class="form-select">
                        <option value=""></option>
                        <option value="D" <?= ($genero == 'D' ? 'selected' : '') ?>>Drama</option>
                        <option value="F" <?= ($genero == 'F' ? 'selected' : '') ?>>Ficção</option>
                        <option value="R" <?= ($genero == 'R' ? 'selected' : '') ?>>Romance</option>
                        <option value="O" <?= ($genero == 'O' ? 'selected' : '') ?>>Outros</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="paginas" class="form-label">Número de páginas:</label>
                    <input type="number" name="paginas" id="paginas" class="form-control" value="<?= $paginas ?>">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-outline-danger px-4">Enviar</button>
                </div>

            </form>
        </div>


        <?php if ($msgErro): ?>
            <div class="alert alert-warning mt-4 w-50 mx-auto" role="alert" id="erros">
                <?= $msgErro ?>
            </div>
        <?php endif; ?>

    </div>

    <script src="./js/validacao.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>