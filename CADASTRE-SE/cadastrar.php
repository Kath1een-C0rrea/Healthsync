<?php
        include "conexao.php";
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nome = $_POST ["nome"];
        $email = $_POST ["email"];
        $senha = $_POST["senha"];

        $stmt = $conn->prepare("INSERT INTO funcionario (funcionario_nome, funcionario_email, funcionario_senha) VALUES (?,?,?)");
        $stmt -> bind_param ("sss", $nome, $email, $senha);

        if ($stmt->execute()) {
            echo "Dados inseridos com sucesso!";
        } else {
            echo "Erro ao inserir dados: " . $stmt->error;
        }
        
        $stmt->close();
        
          }
          
          $conn->close();
    
          header("location:http://localhost/Healthsync/index.php");
    

?>
