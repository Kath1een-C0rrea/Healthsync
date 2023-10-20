<?php
$conn = new mysqli("localhost", "root", "", "db_healthsync");

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

session_start();

if ($_SESSION['autenticado'] !== true) {
    echo "Acesso não autorizado. Faça login primeiro.";
    // Você pode redirecionar o usuário para a página de login ou fazer outra coisa, dependendo dos requisitos do seu sistema.
    exit;
}

// Consulta SQL para selecionar todas as colunas da tabela 'tarefas'
$sql = "SELECT * FROM tarefas";

// Executa a consulta SQL
$result = $conn->query($sql);

// Verifica se a consulta foi executada com sucesso
if ($result) {
    // Inicializa um array para armazenar os resultados
    $resultArray = array();

    // Obtém os resultados e adiciona-os ao array
    while ($row = $result->fetch_assoc()) {
        // Formate as datas de início e fim no padrão brasileiro (DD/MM/YYYY)

        
        $resultArray[] = $row;
    }

    // Converte o array para JSON para que possa ser usado no JavaScript
    $resultJSON = json_encode($resultArray);
} else {
    echo "Erro na consulta: " . $conn->error;
}

// Fecha a conexão com o banco de dados
$conn->close();
?>

<!DOCTYPE html>
<html lang='pt-BR'>
  <head>
    <meta charset='utf-8' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="gerenciador.css">
    <script>

document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'PT-BR',
        eventClick: function(info) {
          Swal.fire(
            'Tarefa: ' + info.event.title,
            'Data Início: ' + info.event.start +
            'Data Fim: ' + info.event.end +
            'Descrição: ' + info.event.extendedProps.description
            
            
          )
        },
            events: <?php echo $resultJSON; ?>, // Carrega os eventos do JSON gerado no PHP
            eventDisplay: 'block', // Exibe os eventos como blocos no calendário
            eventBackgroundColor: 'color', // Define a cor de fundo do evento com base na coluna 'cor_tarefa'
            eventBorderColor: 'color', // Define a cor da borda do evento com base na coluna 'cor_tarefa'
            
        });
        calendar.render();
        calendar.setOption('locale', 'pt-br');

    }) ;

    </script>

  </head>
  <body>
    <div id='app'>
      <div id='sidebar'>
        <div id="logo">
        <form action="logout.php" method="post">
            <button type="submit" id="logoutButton">Logout</button>
                        
        </form>
          <img class="logo" src="imagens/HealthSync-removebg-preview.png" alt="logo">
      </div>
        <!-- Conteúdo da barra lateral (criação de tarefa) -->
        <div class="criartarefa">
    <form action="inserir.php" method="post">
          <h2>Criar Tarefa</h2>
            <label for="taskTitle">Título da Tarefa:</label>
            <input type="text"  id="eventTitle" name="nometarefa" placeholder="Nome do evento" required>

          <input type="datetime-local" id="eventstart" name="datainicio" required>

          <input type="datetime-local"  id="eventEnd" name="datafim" required>

          <p>Urgência da Tarefa</p>
          <select name="selectcor" required>
            <option value="blue" selected>Azul - Baixa</option>
            <option value="green">verde - Razoável</option>
            <option value="yellow">Amarelo - Média</option>
            <option value="red">Vermelho - Alta</option>
          </select> <br> <br>

          <input type="text"  id="eventTitle" name="descricao" placeholder="Descrição"> <br>

          <input type="text"  id="eventTitle" name="Setor" placeholder="Setor encarregado" required> <br>

          <div class="button">
            <br>
            <button type="submit">Adicionar Tarefa</button>
            <br>

    </form>
          </div>
        </div>  
      </div>

      <div id='listar-container'>
    <form action="update_delete/consultar.php" method="post">
            <button type="submit" id="listarButton">Lista de Tarefas</button>
    </div>
        
      <div id='calendar-container'>
        <div id='calendar'></div>
      </div>
    </div>



  </body>
  </html>