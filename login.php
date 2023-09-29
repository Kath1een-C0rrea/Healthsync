<?php
session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_healthsync";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexão com o banco de dados falhou: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

   
    $sql = "SELECT * FROM funcionario WHERE funcionario_email='$email' AND funcionario_senha='$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
       
        header("location: Gerenciador/calendario.php");
    } else {
       
        echo "Login falhou. Verifique suas credenciais.";
    }
}

// Verificar se o usuário está autenticado antes de permitir o acesso à página "calendario.php"
if ($_SESSION['autenticado'] !== true) {
    echo "Acesso não autorizado. Faça login primeiro.";
    header("location: index.php");
}

$conn->close();
?>
