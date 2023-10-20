<?php
session_start();

include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM funcionario WHERE funcionario_email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $linha = $result->fetch_assoc();
        $senha_db = $linha['funcionario_senha'];

        if(password_verify($senha, $senha_db)){
            $_SESSION['username'] = $linha['funcionario_nome'];
            $_SESSION['funcionario_id'] = $linha['funcionario_id'];
            $_SESSION['autenticado'] = true;
            header("Location: ./Gerenciador/calendario.php");
        }

    } else {
        echo "Login falhou. Verifique suas credenciais.";
    }
}

if ($_SESSION['autenticado'] !== true) {
    echo "Acesso não autorizado. Faça login primeiro.";
    header("location: index.php");
}

$conn->close();
?>