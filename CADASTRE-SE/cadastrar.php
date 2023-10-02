<?php
        include "conexao.php";
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nome = $_POST ["nome"];
        $email = $_POST ["email"];
        $senha = $_POST["senha"];

        $senha_hashed = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO funcionario (funcionario_nome, funcionario_email, funcionario_senha) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param ("sss", $nome, $email, $senha_hashed);
        $stmt->execute();        

        
        header("Location: ../index.php");
    }
    
    
$conn->close();
?>
