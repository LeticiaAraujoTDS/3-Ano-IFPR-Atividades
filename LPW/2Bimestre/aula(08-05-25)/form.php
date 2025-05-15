<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Formulario</title>
</head>

<body class="bg-light d-flex row justify-content-center align-items-center vw-100 vh-100">

    <div class="text-center text-success-emphasis">
        <h2>Card de Pet</h2>
    </div>
    <form action="card.php" method="POST" class="form-control w-25 bg-success-subtle shadow-sm text-success-emphasis">

        <div class="m-2">
            <label for="a" class="form-label">Nome do Pet:</label>
            <input type="text" name="nome" id="a" class="form-control">
        </div>

        <div class="m-2">
            <label for="b" class="form-label">Raça do Pet:</label>
            <input type="text" name="raca" id="b" class="form-control">
        </div>

        <div class="m-2">
            <label for="c" class="form-label">Idade do Pet:</label>
            <input type="text" name="idade" placeholder="Ex: 3 anos e 4 meses." id="c" class="form-control">
        </div>

        <div class="m-2">
            <label for="d" class="form-label">Curiosidade do Pet:</label>
            <input type="text" name="curiosidade" placeholder="Ex: Peida dormindo." id="d" class="form-control">
        </div>

        <div class="m-2">
            <label for="e" class="form-label">Foto do Pet:</label>
            <input type="text" name="img" id="e" class="form-control">
        </div>

        <button type="submit" class="btn btn-dark text-bg-success m-2">Enviar</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>