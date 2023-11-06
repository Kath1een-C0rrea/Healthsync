<?php
include "conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $title = $_POST["name"];
    $start = $_POST["start"];
    $end = $_POST["end"];
    $color = $_POST["color"]; 
    $descricao = $_POST["description"];
    $setor_tarefa = $_POST["setor_tarefa"];
}


$sql = "UPDATE tarefas SET title = ?, start = ?, end = ?, color = ?, description = ?, setor_tarefa = ?  
WHERE ID_tarefa = ? ";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssi", $title, $start, $end, $color, $descricao, $setor_tarefa, $id); 

if ($stmt->execute()) {
    header("Location: http://localhost/Healthsync/Gerenciador/calendario.php");
} else {
    echo "Erro ao atualizar paciente: " . $conn->error;
}

$stmt->close();
?>
