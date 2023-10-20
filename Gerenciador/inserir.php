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
    $tarefasetor = $_POST['Setor'];

    $stmt = $conn->prepare("INSERT INTO tarefas (title, start, end, color, description, setor_tarefa) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nometarefa, $datainicio, $datafinal, $selectcor, $tarefadescricao, $tarefasetor);

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