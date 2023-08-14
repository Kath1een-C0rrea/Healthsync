document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector(".reset-form");

    form.addEventListener("submit", function(event) {
        event.preventDefault();

        const emailInput = document.getElementById("email").value;

        if (emailInput.trim() === "") {
            alert("Por favor, insira um endereço de e-mail válido.");
            return;
        }


        const requestData = {
            email: emailInput
        };


        fetch("your-server-endpoint", {
            method: "POST",
            body: JSON.stringify(requestData),
            headers: {
                "Content-Type": "application/json"
            }
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);

            
            if (data.success) {
                alert("Instruções para redefinição de senha foram enviadas para o seu e-mail.");
            } else {
                alert("Não foi possível redefinir a senha. Verifique o endereço de e-mail fornecido.");
            }
        })
        .catch(error => {
            console.error("Erro:", error);
            alert("Ocorreu um erro ao processar a solicitação. Tente novamente mais tarde.");
        });
    });
});

