<?php
$conn = new mysqli("localhost", "root", "", "db_healthsync");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
   

   
    $stmt = $conn->prepare("INSERT INTO funcionario (funcionario_nome, funcionario_email, funcionario_senha) VALUES (?, ?, ?)");

    if ($stmt === false) {
        die("Erro de preparação da declaração: " . $conn->error);
    }

    
    $stmt->bind_param("sss", $nome, $email, $senha);

    if ($stmt->execute()) {
        header("Location: http://localhost/Healthsync/");
        exit();
    } else {
        die("Erro ao inserir dados: " . $stmt->error);
    }

   
    $stmt->close();
}


$conn->close();
?>
