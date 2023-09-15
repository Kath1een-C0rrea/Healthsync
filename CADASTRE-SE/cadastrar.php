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

        $stmt = "INSERT INTO usuario (nome, email, senha, cpf) VALUES (?,?,?,?)";
        $stmt = $conn ->prepare($stmt);
        $stmt -> bind_param ("sssi", $nome, $email, $senha, $cpf);
        header ("location = index.php");
        $conn -> close();
    }
    

    

?>
