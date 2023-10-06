<?php
  
  include "conexao.php";

    session_start();

  echo "Conexão bem-sucedida!";

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nometarefa = $_POST['nometarefa'];
    $datainicio = $_POST['datainicio'];
    $datafinal = $_POST['datafim'];
    $selectcor = $_POST['selectcor'];
    $tarefadescricao = $_POST['descricao'];

    $stmt = $conn->prepare("INSERT INTO tarefas (title, start, end, color, description) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nometarefa, $datainicio, $datafinal, $selectcor, $tarefadescricao);

if ($stmt->execute()) {
    echo "Dados inseridos com sucesso!";
} else {
    echo "Erro ao inserir dados: " . $stmt->error;
}

$stmt->close();

  }
  
  $conn->close();

  header("location: calendario.php")

  


  ?>