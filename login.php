<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    

    // Simulando uma verificação de login com um usuário fixo (substitua isso com seu próprio sistema de autenticação)
    $usuarioValido = array(
        'email' => 'tavaresluanace207@gmail.com',
        'senha' => 'senha123',
    );

    if ($email === $usuarioValido['email'] && $senha === $usuarioValido['senha']) {
        // Login bem-sucedido
        header("location:Gerenciador/calendario.php");
    } else {
        // Login falhou
        echo "Login falhou. Verifique suas credenciais.";
    }
}
?>