<!DOCTYPE html>
<html lang="en">
<head>
    <title>Listar Dados</title>
    <link rel="stylesheet" href="calendario.css">
</head>

        <?php
        include "conexao.php";   

        $sql = "SELECT * FROM tarefas";
        $result= $conn->query($sql);

    echo "<table>";
    echo "<tr><th>Nome da Tarefa</th><th>Início</th><th>Fim</th><th>Urgência</th><th>Descrição</th><th>Editar</th><th>Excluir</th><th></tr>";
    while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>". $row['title']."</td>";
    echo "<td>".$row['start']."</td>";
    echo "<td>".$row['end']."</td>";
    echo "<td>".$row['color']."</td>";
    echo "<td>".$row['description']."</td>";
    echo "<td>"."<a href=editar.php?id=". $row["ID_tarefa"]. ">Editar" . "</a>" . "</td>";
    echo "<td>"."<a href=excluir.php?id=".$row["ID_tarefa"]. ">Excluir". "</a>" . "</td>";
    echo "</tr>";
        }
    echo "</table>";

        if ($result->num_rows === 0){
            echo "Nenhuma tarefa encontrada";
        }
    $conn->close();
    ?>
<body> 

            <form action="http://localhost/Healthsync/Gerenciador/calendario.php" method="post">
            <button type="submit" id="logoutButton">Voltar para o calendario</button>

</body>
</html>