<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];


    if ($email == 'teste@gmail.com' && $senha == 'senha123') {
        // Login bem-sucedido, definir a variável de sessão para indicar que o usuário está autenticado
        $_SESSION['autenticado'] = true;
        header("location:Gerenciador/calendario.php");
    } else {
        // Login falhou
        echo "Login falhou. Verifique suas credenciais.";
    }
}

// Verificar se o usuário está autenticado antes de permitir o acesso à página "calendario.php"
if ($_SESSION['autenticado'] !== true) {
    echo "Acesso não autorizado. Faça login primeiro.";
    header("location:index.php");
}
?>