<?php

$host = "localhost";
$usuario_bd = "root";
$senha_bd = "";
$nome_bd = "db_healthsync";

$conn = new mysqli($host, $usuario_bd, $senha_bd, $nome_bd);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Receber os dados do formulário
$usuario = $_POST['email']; // Corrigido para 'email' em vez de 'usuario'
$nova_senha = password_hash($_POST['nova_senha'], PASSWORD_DEFAULT); // Corrigido para 'nova_senha'


// Consulta SQL para atualizar a senha do usuário
$sql = "UPDATE funcionario SET funcionario_senha = ? WHERE funcionario_email = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $nova_senha, $usuario);

if ($stmt->execute()) {
    echo "Senha redefinida com sucesso.";

    header("Location: http://localhost/HealthSync/Healthsync/index.php");

} else {
    echo "Erro ao redefinir a senha: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
