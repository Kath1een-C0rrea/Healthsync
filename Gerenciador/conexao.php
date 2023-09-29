<?php 

$conn = new mysqli ("localhost","root","","bd_healthsync");
        // verifica se a conexão foi bem-sucedida
    if ($conn->connect_error) {
        die ("Erro de conexão". $conn->connect_error);}

?>