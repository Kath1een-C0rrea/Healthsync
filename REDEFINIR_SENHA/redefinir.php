<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Redefinir Senha</title>
</head>
<body>
    <div class="container">
        <form class="reset-form" action="conexao.php" method="post">
            <h2>Redefinir Senha</h2>
            <p>Informe o e-mail e a nova senha para redefinir sua senha.</p>
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
            <label for="nova_senha">Nova Senha:</label>
            <input type="password" id="nova_senha" name="nova_senha" required>
            <button type="submit">Enviar</button>
            <img src="logoprojeto.png">
        </form>
    </div>
</body>
</html>

