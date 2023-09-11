<?php
        //Conecta ao banco de dados (host, usuario, senha,nome do banco de dados)
    $conn = new mysqli ("localhost","root","","bancolegal");
        // verifica se a conexão foi bem-sucedida
    if ($conn->connect_error) {
        die ("Erro de conexão". $conn->connect_error);
    }
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nome = $_POST ["nome"];
        $email = $_POST ["email"];
        $senha = $_POST["senha"];
        $cpf = $_POST ["cpf"];

        $sql = "INSERT INTO usuario (nome, email, senha, cpf) VALUES (?,?,?,?)";
        $stmt = $conn ->prepare($sql);
        $stmt -> bind_param ("sssi", $nome, $email, $senha, $cpf);
        $stmt ->execute;
        header ("location = exit");
        $conn -> close;
    }

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Cadastre-se</title>
</head>
<body>
      
                <div class="container">
                    <form class="reset-form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                        <img src="logoprojeto.png">
            
                        <label for="nome-completo"></label>
                        <input type="text" id="nome-completo" name="nome" placeholder="Insira o Nome Completo:" required>
            
                        <label for="email"></label>
                        <input type="email" id="email" name="email" placeholder="Insira o E-mail:" required>
            
                        <label for="cpf"></label>
                        <input type="text" id="cpf" name="cpf" placeholder="Insira o CPF:" required>
            
                        <label for="senha"></label>

                        <div class="password-container">
                            <input type="password" id="senha" name="senha" placeholder="Insira a Senha:" required>

                            <BR>

                            <input type="checkbox" id="mostrar-senha">
                            <label for="mostrar-senha" class="mostrar-senha-label">Mostrar senha</label>


                        </div>



                <button type="submit">Cadastre-se</button>
    
              
            </form>
        </div>
    </html>
    




</body>
</html>