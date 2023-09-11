<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthSync</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="pai">
    <div class="figura">
        <div class="logo">
            <img src="Descrição.png" alt="Logo e descrição da marca" class="imagem">
        </div>
    </div>
    <section class="formulario">
        <div class="container-form">
        <h2>Faça login em sua conta</h2>
        <p>Acesse sua conta informando seu <br> e-mail e senha</p>
        <ul class="menu-form">
            <li><a href="index.php">Login</a></li>
            <li><a href="CADASTRE-SE\cadastro.php">Cadastro</a></li>
            
        </ul>
        <form action="login.php" method="post">
            <input type="email" name="email" placeholder="E-mail">
            <input type="password" name="senha" placeholder="Senha">
            <button type="submit">Enviar</button>
                <a class="esqueceu" href="REDEFINIR SENHA\index.php">Esqueceu a senha?</a>
</form>

        

            
        </form>
        </div>
    </section>
    </div>
</body>
</html>