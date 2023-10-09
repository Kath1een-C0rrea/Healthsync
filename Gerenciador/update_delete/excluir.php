<?php
include "conexao.php"; 

if (isset($_GET['id'])) {
  $id_paciente = $_GET['id'];

  $sql = "DELETE FROM paciente WHERE id_paciente = ?";
  
  
  $stmt = $conexao->prepare($sql);
  
  
  $stmt->bind_param("i", $id_paciente);
  
  if ($stmt->execute()) {
    header("Location: consultar.php"); 
    exit();
  } else {
    echo "Erro ao excluir paciente: " . $stmt->error;
  }

  $stmt->close();
}
?>