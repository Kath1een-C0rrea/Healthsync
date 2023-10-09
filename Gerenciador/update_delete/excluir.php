<?php
include "conexao.php"; 

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
  $id_tarefa = $_GET['id'];

  $sql = "DELETE FROM tarefas WHERE id_tarefa = ?";
  
  // Certifique-se de que $conexao está definida corretamente no arquivo conexao.php
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $id_tarefa);
  
  if ($stmt->execute()) {
    header("Location: consultar.php"); 
    exit();
  } else {
    echo "Erro ao excluir paciente: " . $stmt->error;
  }

  $stmt->close();
} else {
  echo "ID de paciente inválido.";
}
?>

