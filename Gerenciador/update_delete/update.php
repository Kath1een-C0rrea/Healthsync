<?php
include "conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $title = $_POST["name"];
    $start = $_POST["start"];
    $end = $_POST["end"];
    $color = $_POST["color"]; 
    $descricao = $_POST["description"];
}


$sql = "UPDATE tarefas SET title = ?, start = ?, end = ?, color = ?, description = ?  WHERE ID_tarefa = ? ";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $title, $start, $end, $color, $descricao, $id); 

if ($stmt->execute()) {
    header("Location: http://localhost/Healthsync/Gerenciador/calendario.php");
} else {
    echo "Erro ao atualizar paciente: " . $conn->error;
}

$stmt->close();
?>
