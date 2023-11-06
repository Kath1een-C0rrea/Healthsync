<?php

    include "conexao.php";

    if (isset($_GET['id'])){
        $id = $_GET['id'];
    }

        $sql = "SELECT * FROM tarefas WHERE ID_tarefa = ?";
        $stmt = $conn->prepare ($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado =$stmt-> get_result();

        if ($resultado->num_rows == 1){
            $tarefa = $resultado->fetch_assoc();
        } else {
            die("ID da Tarefa não encontrada");
        } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Edição </title>
    <link rel="stylesheet" href="editar.css">
</head>
<body>

<form action="update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $tarefa ['ID_tarefa']; ?>">

    <label for="nome">Nome da Tarefa:</label>
    <input type="text" name="name" value="<?php echo $tarefa ['title']; ?>" required>

    <label for="nome">Inicio (Data e Horário):</label>
    <input type="text" name="start" value="<?php echo $tarefa ['start']; ?>" required>

    <label for="nome">Fim (Data e Horário):</label>
    <input type="text"  name="end" value="<?php echo $tarefa ['end']; ?>" required>

    <label for="nome">Descrição:</label>
    <input type="text" name="description" value="<?php echo $tarefa ['description']; ?>" required>
    
    <label for="nome">Setor encarregado:</label>
    <input type="text" name="setor_tarefa" value="<?php echo $tarefa ['setor_tarefa']; ?>" required> 

    <label for="urgencia">Urgência:</label>
            <select name="color" required>
                <option value="blue">azul</option>
                <option value="green">verde</option>
                <option value="yellow">amarelo</option>
                <option value="red">vermelho</option>

            </select>

            <button type="submit">Atualizar</button>
</form>




</body>
</html>
