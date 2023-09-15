<?php
  
  $conn = new mysqli("localhost", "root", "", "healthsync");
  
  
  if ($conn->connect_error) {
      die("Falha na conexão: " . $conn->connect_error);
  }
  
  echo "Conexão bem-sucedida!";

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nometarefa = $_POST['nometarefa'];
    $datainicio = $_POST['datainicio'];
    $datafinal = $_POST['datafim'];
    $selectcor = $_POST['selectcor'];

    $stmt = $conn->prepare("INSERT INTO tarefas (nometarefa, datainicio, datafim, selectcor) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nometarefa, $datainicio, $datafinal, $selectcor);

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