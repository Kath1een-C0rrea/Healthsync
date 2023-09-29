<?php 

$conn = new mysqli ("localhost","root","","db_healthsync");
        // verifica se a conexão foi bem-sucedida
    if ($conn->connect_error) {
        die ("Erro de conexão". $conn->connect_error);}

?>