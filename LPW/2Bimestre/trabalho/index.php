<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Cadastro de Pets</title>
</head>

<body class="bg-danger-subtle text-danger-emphasis">
    <?php
    session_start();
    require_once("util/Conexao.php");
    require_once("modelo/Pet.php");
    require_once("dao/PetDAO.php");

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $petDao = new PetDAO();

    $msgErro = $_SESSION['msgErro'] ?? "";
    $mensagem = $_SESSION['mensagem'] ?? "";
    $form_data = $_SESSION['form_data'] ?? [];

    $nome = $form_data['nome'] ?? '';
    $raca = $form_data['raca'] ?? '';
    $cor = $form_data['cor'] ?? '';
    $genero = $form_data['genero'] ?? '';
    $porte = $form_data['porte'] ?? '';
    $foto = $form_data['foto'] ?? '';
    $curiosidade = $form_data['curiosidade'] ?? '';

    // Limpa as mensagens da sessão
    unset($_SESSION['msgErro']);
    unset($_SESSION['mensagem']);
    unset($_SESSION['form_data']);

    ?>
    <?php if ($msgErro): ?>
        <div class="alert alert-light text-danger border-danger mt-4 w-50 mx-auto" role="alert">
            <?= $msgErro ?>
        </div>
    <?php endif; ?>

    <?php if ($mensagem): ?>
        <div class="alert alert-success mt-4 w-50 mx-auto" role="alert">
            <?= $mensagem ?>
        </div>
    <?php endif; ?>

    <div class="container py-5">

        <h1 class="mb-4 text-center">Formulário</h1>

        <div class="card bg-light p-4 mx-auto " style="max-width: 80%;">
            <form action="verificacao.php" method="POST">

                <div class="mb-3">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" name="nome" id="nome" class="form-control" value="<?= $nome ?>">
                </div>

                <div class="mb-3">
                    <label for="raca" class="form-label">Raça:</label>
                    <input type="text" name="raca" id="raca" class="form-control" value="<?= $raca ?>">
                </div>

                <div class="mb-3">
                    <label for="cor" class="form-label">Cor:</label>
                    <select name="cor" id="cor" class="form-select">
                        <option value=""></option>
                        <option value="P" <?= ($cor == 'P' ? 'selected' : '') ?>>Preto</option>
                        <option value="C" <?= ($cor == 'C' ? 'selected' : '') ?>>Caramelo</option>
                        <option value="M" <?= ($cor == 'M' ? 'selected' : '') ?>>Marrom</option>
                        <option value="L" <?= ($cor == 'L' ? 'selected' : '') ?>>Loiro</option>
                        <option value="B" <?= ($cor == 'B' ? 'selected' : '') ?>>Branco</option>
                        <option value="R" <?= ($cor == 'R' ? 'selected' : '') ?>>Rajadinho</option>
                        <option value="F" <?= ($cor == 'F' ? 'selected' : '') ?>>Marrom claro</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="genero" class="form-label">Gênero:</label>
                    <select name="genero" id="genero" class="form-select">
                        <option value=""></option>
                        <option value="M" <?= ($genero == 'M' ? 'selected' : '') ?>>Masculino</option>
                        <option value="F" <?= ($genero == 'F' ? 'selected' : '') ?>>Feminino</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="porte" class="form-label">Porte:</label>
                    <select name="porte" id="porte" class="form-select">
                        <option value=""></option>
                        <option value="G" <?= ($porte == 'G' ? 'selected' : '') ?>>Grande</option>
                        <option value="M" <?= ($porte == 'M' ? 'selected' : '') ?>>Médio</option>
                        <option value="P" <?= ($porte == 'P' ? 'selected' : '') ?>>Pequeno</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="curiosidade" class="form-label">Curiosidade:</label>
                    <input type="text" name="curiosidade" id="curiosidade" class="form-control" value="<?= $curiosidade ?>">
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Link da foto:</label>
                    <input type="text" name="foto" id="foto" class="form-control" value="<?= $foto ?>">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-outline-danger px-4">Enviar</button>
                </div>

            </form>
        </div>

        <?php
        $pets = $petDao->Listar();
        if ($pets): ?>

            <h1 class="mb-4  mt-4 text-center">Listagem</h1>

            <div class="card p-2 mx-auto mb-3 bg-light" style="max-width: 80%;">


                <form action="dao/PetDAO.php" method="POST">
                    <table class="table table-bordered rounded-1 table-striped text-center align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>FOTO</th>
                                <th>NOME</th>
                                <th>RAÇA</th>
                                <th>COR</th>
                                <th>GÊNERO</th>
                                <th>PORTE</th>
                                <th>CURIOSIDADE</th>
                                <th>EXCLUIR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $pets = $petDao->Listar();
                            foreach ($pets as $p): ?>
                                <tr>
                                    <td><?= $p->getId() ?></td>
                                    <td> <img src="<?= $p->getFoto() ?>" class="card-img mb-2 h-25 w-25"></td>
                                    <td class="text-start px-4"><?= $p->getNome() ?></td>
                                    <td class="text-start px-4"><?= $p->getRaca() ?></td>
                                    <td class="text-start px-4">
                                        <?php
                                        switch ($p->getCor()) {
                                            case 'P':
                                                echo "Preto";
                                                break;
                                            case 'C':
                                                echo "Caramelo";
                                                break;
                                            case 'M':
                                                echo "Marrom";
                                                break;
                                            case 'L':
                                                echo "Loiro";
                                                break;
                                            case 'B':
                                                echo "Branco";
                                                break;
                                            case 'R':
                                                echo "Rajadinho";
                                                break;
                                            case 'F':
                                                echo "Marrom claro";
                                                break;
                                            default:
                                                echo "Não foi possível obter a cor.";
                                                break;
                                        } ?>
                                    </td>
                                    <td class="text-start px-4">
                                        <?php
                                        switch ($p->getGenero()) {
                                            case 'M':
                                                echo "Macho";
                                                break;
                                            case 'F':
                                                echo "Fêmea";
                                                break;
                                            default:
                                                echo "Não foi possível obter o gênero.";
                                                break;
                                        } ?>
                                    </td>
                                    <td class="text-start px-4">
                                        <?php
                                        switch ($p->getPorte()) {
                                            case 'G':
                                                echo "Grande";
                                                break;
                                            case 'M':
                                                echo "Médio";
                                                break;
                                            case 'P':
                                                echo "Pequeno";
                                                break;
                                            default:
                                                echo "Não foi possível obter o porte.";
                                                break;
                                        } ?>
                                    </td>
                                    <td><?= $p->getCuriosidade() ?></td>
                                    <td>
                                        <a class="btn btn-outline-danger" style="text-decoration:none;" id="botao" href='verificacao.php?id=<?= $p->getId() ?>' onclick="return confirm('Confirma a exclusão?')">X</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
            </div>
        <?php endif; ?>

        <div class="paginaCard d-flex justify-content-center">
            <button class="btn btn-danger mt-3"><a href="cards.php" style="text-decoration:none; color:#ffffff">Ir para a página de Cards</a></button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>