<!DOCTYPE html>
<html lang="en">
<head>
    <title>Listar Dados</title>
    <link rel="stylesheet" href="css.css">
</head>

        <?php
        include "conexao.php";   

        $sql = "SELECT * FROM tarefas";
        $result= $conn->query($sql);

    echo "<table>";
    echo "<tr><th>nome da tarefas</th><th>inicio da tarefa</th><th>fim da tarefa</th><th>urgencia</th><th>Editar</th><th>Excluir</th><th></tr>";
    while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>". $row['nometarefa']."</td>";
    echo "<td>".$row['datainicio']."</td>";
    echo "<td>".$row['datafim']."</td>";
    echo "<td>".$row['selectcor']."</td>";
    echo "<td>"."<a href=editar.php?id=". $row["ID_tarefa"]. ">Editar" . "</a>" . "</td>";
    echo "<td>"."<a href=excluir.php?id=".$row["ID_tarefa"]. ">Excluir". "</a>" . "</td>";
    echo "</tr>";
        }
    echo "</table>";

        if ($result->num_rows === 0){
            echo "nenhum paciente encontrado";
        }
    $conn->close();
    ?>
</html>