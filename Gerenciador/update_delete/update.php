<?php
include "conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $title = $_POST["nome"];
    $start = $_POST["inicio"];
    $end = $_POST["fim"];
    $color = $_POST["cor"]; 
    $descricao = $_POST["descricao"];
}


$sql = "UPDATE tarefas SET title = ?, start = ?, end = ?, color = ?, descricao_tarefa = ?  WHERE ID_tarefa = ? ";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $title, $start, $end, $color, $descricao, $id); 

if ($stmt->execute()) {
    header("Location: http://localhost/Healthsync/Gerenciador/calendario.php");
} else {
    echo "Erro ao atualizar paciente: " . $conn->error;
}

$stmt->close();
?>
