<?php
include "conexao.php";
session_start();
echo "Conexão bem-sucedida!";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupere o ID do registro que deseja excluir (suponhamos que ele seja passado via POST)
    $idParaExcluir = $_POST['id_para_excluir'];

    $stmt = $conn->prepare("DELETE FROM tarefas WHERE id = ?");
    $stmt->bind_param("i", $idParaExcluir);

    if ($stmt->execute()) {
        echo "Tarefa excluído com sucesso!";
    } else {
        echo "Erro ao excluir registro: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();

header("location: calendario.php");
?>