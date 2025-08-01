<?php
require_once(__DIR__ . "/../../controller/CursoController.php");
$cursoCont = new CursoController();
$lista = $cursoCont->listar();
include_once(__DIR__ . "/../include/header.php");
?>

<h3>Inserir alunos</h3>

<form method="POST" action="">
    <div>
        <label for="txtNome">Nome:</label>
        <input name="nome" type="text" id="txtNome" placeholder="Informe o nome . . .">
    </div>

    <div>
        <label for="txtIdade">Idade:</label>
        <input name="idade" type="number" id="txtIdade" placeholder="Informe a idade . . .">
    </div>

    <div>
        <label for="selEstrang">Estrangeiro:</label>
        <select name="estrang" id="selEstrang">
            <option value="">---Selecione---</option>
            <option value="S">Sim</option>
            <option value="N">Não</option>
        </select>
    </div>

    <div>
        <label for="selCurso">Curso:</label>
        <select name="curso" id="idCurso">
            <option value="">---Selecione---</option>
            <?php foreach ($lista as $curso): ?>
                <option value="<?= $curso->getID() ?>">
                    <?= $curso ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <button type="submit">Enviar</button>
    </div>
    

</form>

<?php
include_once(__DIR__ . "/../include/footer.php");
?>