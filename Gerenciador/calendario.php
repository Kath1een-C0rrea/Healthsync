<?php 

  session_start();

if ($_SESSION['autenticado'] !== true) {
  echo "Acesso não autorizado. Faça login primeiro.";
  // Você pode redirecionar o usuário para a página de login ou fazer outra coisa, dependendo dos requisitos do seu sistema.
  exit;}
  


?>

<!DOCTYPE html>
<html lang='pt-BR'>
  <head>
    <meta charset='utf-8' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <link rel="stylesheet" href="css.css">
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          locale: 'PT-BR',
          events: [ // Array de eventos
            {
              title: 'esterilização de seringas',
              start: '2023-08-14', // Data de início da tarefa (formato: YYYY-MM-DD)
              end: '2023-08-17',   // Data de término da tarefa (formato: YYYY-MM-DD)
              color: 'green'  ,      // Cor do evento no calendário
              
            },
            {
              title: 'descarga de oxigenio ',
              start: '2023-08-18', // Data de início da tarefa (formato: YYYY-MM-DD)
              end: '2023-08-19',   // Data de término da tarefa (formato: YYYY-MM-DD)
              color: 'yellow'  ,      // Cor do evento no calendário
            },
            {
              title: ' treinamento ',
              start: '2023-08-17', // Data de início da tarefa (formato: YYYY-MM-DD)
              end: '2023-08-17',   // Data de término da tarefa (formato: YYYY-MM-DD)
              color: 'blue'  ,      // Cor do evento no calendário
            },
            {
              title: 'manutenção nos bebedouros ',
              start: '2023-08-30', // Data de início da tarefa (formato: YYYY-MM-DD)
              end: '2023-08-32',   // Data de término da tarefa (formato: YYYY-MM-DD)
              color: 'orange'  ,      // Cor do evento no calendário
            },
            {
              title: 'palestra',
              start: '2023-08-12', // Data de início da tarefa (formato: YYYY-MM-DD)
              end: '2023-08-12',   // Data de término da tarefa (formato: YYYY-MM-DD)
              color: 'gray'  ,      // Cor do evento no calendário
            },
            {
              title: 'palestra',
              start: '2023-08-08', // Data de início da tarefa (formato: YYYY-MM-DD)
              end: '2023-08-08',   // Data de término da tarefa (formato: YYYY-MM-DD)
              color: 'gray'  ,      // Cor do evento no calendário
            },
            {
              title: ' descarga de Mercadoria',
              start: '2023-08-10', // Data de início da tarefa (formato: YYYY-MM-DD)
              end: '2023-08-10',   // Data de término da tarefa (formato: YYYY-MM-DD)
              color: 'yellow'  ,      // Cor do evento no calendário
              eventDetails:'Entrega de novos respiradores'
            },
            {
              title: 'manutenção nas ambulancias',
              start: '2023-08-22', // Data de início da tarefa (formato: YYYY-MM-DD)
              end: '2023-08-25',   // Data de término da tarefa (formato: YYYY-MM-DD)
              color: 'orange'  ,      // Cor do evento no calendário
            },
            {
              title: 'chegada dos novos funcionarios',
              start: '2023-08-25',
              end: '2023-08-25',
              color: 'pink',
            },
            {
              title: 'treinamento',
              start: '2023-08-26', // Data de início da tarefa (formato: YYYY-MM-DD)
              end: '2023-08-26',   // Data de término da tarefa (formato: YYYY-MM-DD)
              color: 'blue'  ,      // Cor do evento no calendário
            },
            {
              title: 'palestra',
              start: '2023-08-27', // Data de início da tarefa (formato: YYYY-MM-DD)
              end: '2023-08-27',   // Data de término da tarefa (formato: YYYY-MM-DD)
              color: 'gray'  ,      // Cor do evento no calendário
              
            }
          ], 
        });
        calendar.render();
      });
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
    <form action="conexao.php" method="post">
          <h2>Criar Tarefa</h2>
            <label for="taskTitle">Título da Tarefa:</label>

            <input type="text"  id="eventTitle" name="nometarefa">

          <input type="date"  id="eventstart" name="datainicio">

          <input type="date"  id="eventEnd" name="datafim">

          <select name="selectcor">
            <option value="azul" selected>Azul</option>
            <option value="verde">Verde</option>
            <option value="amarelo">Amarelo</option>
            <option value="vermelho">Vermelho</option>
          </select>

          <div class="button">
            <br>
<<<<<<< HEAD
            <button type="submit">Adicionar Tarefa</button>
            <br>
=======
            <input type="submit" value="Adicionar Tarefa">
>>>>>>> f56471bc599dd59d7d8b3d9edc23ac3b8a874e74
    </form>
          </div>
        </div>  
      </div>
      
      <div id='calendar-container'>
        <div id='calendar'></div>
      </div>
    </div>
  </body>
  </html>
