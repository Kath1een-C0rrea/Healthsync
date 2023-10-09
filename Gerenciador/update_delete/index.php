<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthSync - Editar/Excluir</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Editar/Excluir Registro</h1>

    <form action="C:\xampp\htdocs\Healthsync\CADASTRE-SE" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        Nome: <input type="text" name="nome" value="<?php echo $nome; ?>"><br>
        

        <input type="submit" name="submit" value="Atualizar">
        <input type="submit" name="submit" value="Excluir">
    </form>
</body>
</html>

<?php
include "conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    if ($_POST['submit'] === 'Atualizar') {
        
        $nome = $_POST['funcionario_nome']; 
        

        $query = "UPDATE funcionario SET nome='$nome' WHERE id=$id";
        $result = mysqli_query($conexao, $query);

        if ($result) {
            echo "Registro atualizado com sucesso.";
        } else {
            echo "Erro ao atualizar o registro: " . mysqli_error($conexao);
        }
    } elseif ($_POST['submit'] === 'Excluir') {
     
        $query = "DELETE FROM funcionario WHERE id=$id";
        $result = mysqli_query($conexao, $query);

        if ($result) {
            echo "Registro excluído com sucesso.";
        } else {
            echo "Erro ao excluir o registro: " . mysqli_error($conexao);
        }
    }
}
?>

