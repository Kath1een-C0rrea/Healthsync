document.addEventListener("DOMContentLoaded", function() {
    const mostrarSenhaCheckbox = document.getElementById("mostrar-senha");
    const senhaInput = document.getElementById("senha");

    mostrarSenhaCheckbox.addEventListener("change", function() {
        if (mostrarSenhaCheckbox.checked) {
            senhaInput.type = "text";
        } else {
            senhaInput.type = "password";
        }
    });

    const form = document.querySelector(".reset-form");
    form.addEventListener("submit", function(event) {
        event.preventDefault(); 

        const nomeInput = document.getElementById("nome-completo");
        const emailInput = document.getElementById("email");
        const cpfInput = document.getElementById("cpf");
        const senhaInput = document.getElementById("senha");

       
        fetch("your-server-endpoint", {
            method: "POST",
            body: JSON.stringify({
                nome: nomeInput.value,
                email: emailInput.value,
                cpf: cpfInput.value,
                senha: senhaInput.value
            }),
            headers: {
                "Content-Type": "application/json"
            }
        })
        .then(response => response.json())
        .then(data => {
         
            console.log(data);
        })
        .catch(error => {
            console.error("Error:", error);
        });
    });
});
