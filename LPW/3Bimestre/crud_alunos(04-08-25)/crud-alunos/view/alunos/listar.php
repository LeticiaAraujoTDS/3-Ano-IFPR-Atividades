<?php
    require_once(__DIR__ . "/../../controller/AlunoController.php");
    //chamar o controller para obter a lista de alunos
    $alunoCont = new AlunoController();
    $lista = $alunoCont->listar();
    // print_r($lista);
    //incluir o header
    include_once(__DIR__ . "/../include/header.php");

?>

<h2>Listagem de Alunos</h2>
<div>
   <button><a href="inserir.php">Inserir</a></button> 
</div>

<table border="1">
    <!-- cabeçalho -->
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Idade</th>
        <th>Estrangeiro</th>
        <th>Curso</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>

    <!-- dados -->
    <?php foreach ($lista as $aluno): ?>
        <tr>
            <td>
                <?= $aluno->getID(); ?>
            </td>
            <td>
                <?= $aluno->getNome(); ?>
            </td>
            <td>
                <?= $aluno->getIdade(); ?>
            </td>
            <td>
                <?= $aluno->getEstrangeiroTexto(); ?>
            </td>
            <?php $curso = $aluno->getCurso();//getCurso é um objeto, ai precisa setar o objeto separadamente?>
            <td>
                <?= $curso->getNome() . " (" . $curso->getTurnoCurso() . ")"; ?>
            </td>
            <td></td>
            <td>X</td>
        </tr>
    <?php endforeach; ?>
</table>
<?php

include_once(__DIR__ . "/../include/footer.php");

?>