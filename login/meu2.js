document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector(".formulario form");
    const emailInput = form.querySelector('input[name="email"]');
    const nomeInput = form.querySelector('input[name="nome"]');
    const senhaInput = form.querySelector('input[name="senha"]');

    form.addEventListener("submit", function(event) {
        event.preventDefault();

        const email = emailInput.value;
        const nomeUsuario = nomeInput.value;
        const senha = senhaInput.value;

        if (email.trim() === "" || nomeUsuario.trim() === "" || senha.trim() === "") {
            alert("Por favor, preencha todos os campos.");
            return;
        }

        if (email === "tavaresluanace207@gmail.com" && nomeUsuario === "Luana Tavares" && senha === "2729") {
            alert("Login bem-sucedido! Redirecionando para o perfil...");
            window.location.href = "perfil.html";
        } else {
            alert("Credenciais inválidas. Tente novamente.");
        }
    });
});
