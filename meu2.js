document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    const emailInput = form.querySelector('input[name="email"]');
    const nomeInput = form.querySelector('input[name="nome"]');
    const senhaInput = form.querySelector('input[name="senha"]');
    const button = form.querySelector("button");
      
    form.addEventListener("submit", function(event) {
      event.preventDefault();
    
     
      if (!emailInput.value || !nomeInput.value || !senhaInput.value) {
        alert("Preencha todos os campos");
        return;
      }
    
      if (
        emailInput.value === "tavaresluanace207@gmail.com" &&
        nomeInput.value === "Luana Tavares" &&
        senhaInput.value === "2729"
      ) {
        alert("Bem vindo de volta!");
        window.location.href = "Gerenciador\calendario.html";
      } else {
        alert("Iformações inválidas. Tente novamente.");
      }
    });
  });
  