<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Conexão</title>
</head>

<body>

    <form action="Creator.php" method="POST">

        <h1>EasyMVC</h1>
        <h2>Configuração</h2>
        <label for="servidor">Servidor:</label>
        <input type="text" name="servidor" id="servidor" required>

        <label for="banco">Banco:</label>
        <input type="text" name="banco" id="banco" required>

        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario" id="usuario" required>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required>

        <button type="submit" >Enviar</button>

    </form>

</body>

</html>