<!DOCTYPE html>
<html lang="en">
<head>
    <title>Listar Dados</title>
    <link rel="stylesheet" href="lista.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

        <?php
        include "conexao.php";   

        $sql = "SELECT * FROM tarefas";
        $result= $conn->query($sql);

    echo "<table>";
    echo "<tr><th>Nome da Tarefa</th><th>Início</th><th>Fim</th><th>Urgência</th><th>Descrição</th><th>Setor</th><th>Editar</th><th>Excluir</th><th></tr>";
    while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>". $row['title']."</td>";
    echo "<td>".$row['start']."</td>";
    echo "<td>".$row['end']."</td>";
    echo "<td>".$row['color']."</td>";
    echo "<td>".$row['description']."</td>";
    echo "<td>".$row['setor_tarefa']."</td>";
    echo "<td>"."<a href=editar.php?id=". $row["ID_tarefa"]. ">Editar" . "</a>" . "</td>";
    echo "<td><a href='#' class='excluir-link' data-id='".$row["ID_tarefa"]."'>Excluir</a></td>";
    echo "</tr>";
        }
    echo "</table>";

        if ($result->num_rows === 0){
            echo "Nenhuma tarefa encontrada";
        }
    $conn->close();
    ?>
    <script>
    // Adiciona um evento de clique aos links de exclusão
    const excluirLinks = document.querySelectorAll('.excluir-link');
    excluirLinks.forEach(link => {
        link.addEventListener('click', (event) => {
            event.preventDefault();
            const tarefaId = link.getAttribute('data-id');
            mostrarConfirmacaoExclusao(tarefaId);
        });
    });

    // Função para mostrar o SweetAlert de confirmação
    function mostrarConfirmacaoExclusao(tarefaId) {
        Swal.fire({
            title: 'Confirmação',
            text: 'Deseja realmente excluir esta tarefa?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, excluir',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirecione para a página de exclusão com o ID da tarefa
                window.location.href = 'excluir.php?id=' + tarefaId;
            }
        });
    }
</script>

<body> 

            
            <button type="submit" id="logoutButton" ><a class="logout" href="http://localhost/Healthsync/Gerenciador/calendario.php">Voltar para o calendario</a></button>

</body>
</html>