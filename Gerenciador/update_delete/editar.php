
Conversation opened. 1 unread message.

Skip to content
Using Gmail with screen readers
Enable desktop notifications for Gmail.
   OK  No thanks
1 of 129
(no subject)
Inbox

Igor Daniel
11:11 AM (1 minute ago)
to me

   
Translate message
Turn off for: Portuguese
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
</head>
<body>
    
<h1>Editar Paciente</h1>

<form action="update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $tarefa ['ID_tarefa']; ?>">

    <label for="nome">Descrição da Tarefa</label>
    <input type="text" name="nome" value="<?php echo $tarefa ['title']; ?>" required>

    <label for="nome">Inicio</label>
    <input type="text" name="inicio" value="<?php echo $tarefa ['start']; ?>" required>

    <label for="nome">Final</label>
    <input type="text"  name="fim" value="<?php echo $tarefa ['end']; ?>" required>

    <label for="nome">Descrição</label>
    <input type="text" name="descricao" value="<?php echo $tarefa ['descricao_tarefa']?>" required>
    
    <label for="urgencia">Urgencia:</label>
            <select name="cor" required>
                <option value="blue">azul</option>
                <option value="green">verde</option>
                <option value="yellow">amarelo</option>
                <option value="red">vermelho</option>

            </select>

            <button type="submit">Atualizar</button>
</form>




</body>
</html>
