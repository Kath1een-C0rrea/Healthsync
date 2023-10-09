<?php
include "conexao.php";

if($SERVER['REQUEST_METHOD'] == 'POST'){
    $funcionario_id= $_POST['funcionario_id'];
    $nomd= $_POST['funcionario_nome'];
    $email= $_POST['funcionario_email'];

$sql= "UPDATE funcionario SET funcionario_id=?, funcionario_nome=?, funcionario_email=? WHERE funcionario_id=?";

$stmt= $conn->prepare($sql);
$stmt->bind_param("sss", $funcionario_id, $funcionario_nome, $funcionario_email);

if ($stmt->execute()){
header("Location: consultar.php");
exit();

} else {
    echo "Erro ao atualizar paciente: ".$stmt->error";
}

$stmt->close();
}else {
    $funcionario_id= $_GET['id'];
    $sql= "SELECT * FROM funcionario WERE funcionario_id=?"

    $stmt= $conexao->prepare($sql);
    $stmt->bind_param("i", $funcionario_id);

    if($stmt->execute()){
        
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
      $row = $result->fetch_assoc();
    } else {
      echo "Paciente não encontrado.";
      exit();
    }
  } else {
    echo "Erro na consulta: " . $stmt->error;
    exit();
  }
  $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Editar Funcionário</title>
</head>
<body>
  <h1>Editar Funcionário</h1>
  <form action="" method="post">
    <input type="hidden" name="id_paciente" value="<?php echo $row['funcionario_id']; ?>">
    
    <label for="nome">ID:</label>
    <input type="text" id="nome" name="nome" value="<?php echo $row['funcionario_nome']; ?>" required><br>

    <label for="cpf">Nome:</label>
    <input type="text" id="email" name="email" value="<?php echo $row['funcionario_email']; ?>" required><br>


    <input type="submit" value="Atualizar">
  </form>
  <a href="consultar.php">Voltar para a Lista de Pacientes</a>
</body>
</html>