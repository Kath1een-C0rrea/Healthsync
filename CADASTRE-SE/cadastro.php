<?php 
include "conexao.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Cadastre-se</title>
</head>
<body>
      
                <div class="container">
                    <form class="reset-form" method="POST" action="cadastrar.php">
                        <img src="logoprojeto.png">
            
                        <label for="nome-completo"></label>
                        <input type="text" id="nome-completo" name="nome" placeholder="Insira o Nome Completo:" required>
            
                        <label for="email"></label>
                        <input type="email" id="email" name="email" placeholder="Insira o E-mail:" required>
            

            
                        <label for="senha"></label>

                        <div class="password-container">
                            <input type="password" id="senha" name="senha" placeholder="Insira a Senha:" required>

                            <BR>

                            <input type="checkbox" id="mostrar-senha">
                            <label for="mostrar-senha" class="mostrar-senha-label">Mostrar senha</label>

                            <script>
                                const checkbox = document.getElementById('mostrar-senha');
const senhaInput = document.getElementById('senha');

checkbox.addEventListener('change', function() {
  senhaInput.type = this.checked ? 'text' : 'password';
});

                                </script>

                        </div>



                <input type="submit" value="cadastre-se">
    
              
            </form>
        </div>
    </html>
    




</body>
</html>