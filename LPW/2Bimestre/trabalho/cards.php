<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilo.css">
    <title>Cards</title>
</head>

<body class="bg-danger-subtle text-danger-emphasis d-flex justify-content-center">

    <div class="container py-5">
        <?php
        require_once("util/Conexao.php");
        require_once("modelo/Pet.php");
        require_once("dao/PetDAO.php");
        include("verificacao.php");
        $pets = $petDao->Listar();
        if ($pets): ?>
            <div class="d-flex flex-wrap justify-content-center gap-4">
                <?php foreach ($pets as $p): ?>
                    <div class="card" style="width: 18rem;">
                        <img src="<?= $p->getFoto() ?>" class="card-img-top">
                        <div class="card-body">
                            <h1><?= $p->getNome() ?></h1>
                            <p>Raça: <?= $p->getRaca() ?></p>
                            <p>Gênero: <?= ($p->getGenero() == 'M' ? 'Macho' : 'Fêmea') ?></p>
                            <p>Cor:
                                <?php
                                switch ($p->getCor()) {
                                    case 'P':
                                        echo 'Preto';
                                        break;
                                    case 'C':
                                        echo 'Caramelo';
                                        break;
                                    case 'M':
                                        echo 'Marrom';
                                        break;
                                    case 'L':
                                        echo 'Loiro';
                                        break;
                                    case 'B':
                                        echo 'Branco';
                                        break;
                                    case 'R':
                                        echo 'Rajadinho';
                                        break;
                                    case 'F':
                                        echo 'Marrom Claro';
                                        break;
                                    default:
                                        echo 'Não informado';
                                }
                                ?>
                            </p>
                            <p>Porte:
                                <?php
                                switch ($p->getPorte()) {
                                    case 'G':
                                        echo 'Grande';
                                        break;
                                    case 'M':
                                        echo 'Médio';
                                        break;
                                    case 'P':
                                        echo 'Pequeno';
                                        break;
                                    default:
                                        echo 'Não informado';
                                }
                                ?>
                            </p>
                            <p>Curiosidade: <?= $p->getCuriosidade() ?></p>
                            <div class="botaoExcluir d-flex justify-content-center">
                                <p><a class="btn btn-danger px-4" href='verificacao.php?id=<?= $p->getId() ?>' onclick="return confirm('Confirma a exclusão?')">X</a></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="botaoVoltar d-flex justify-content-center mt-4">
                <a href="index.php" class="btn btn-danger">Voltar</a>
            </div>

        <?php else: ?>
            <!-- Mensagem -->
            <div class="alert alert-light mx-auto text-center text-danger-emphasis w-75">
                <h1>Não há nenhum Pet cadastrado no momento!<br>Volte e cadastre um para ver o card!</h1>
            </div>
            <!-- Botão de voltar -->
            <div class="botaoVoltar d-flex justify-content-center mx-auto">
                <button class="btn btn-danger row"><a href="index.php" style="text-decoration:none; color:#ffffff">Voltar</a></button>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>