<?php
  
  $conn = new mysqli("healthsync", "igorsimples", "senha123", "tarefas");
  
  
  if ($conn->connect_error) {
      die("Falha na conexão: " . $conn->connect_error);
  }
  
  echo "Conexão bem-sucedida!";
  
  $conn->close();


  ?>