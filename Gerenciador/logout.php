<?php
// Inicie a sessão (caso ainda não tenha sido iniciada)
session_start();

session_unset();

// Destrua a sessão
session_destroy();



// Redirecione para a página de login (ou qualquer outra página de sua escolha)
// header("location: http://localhost/Healthsync/index.php"); // Substitua "index.php" pelo caminho da página de login
header ("Location: ../index.php");
?>