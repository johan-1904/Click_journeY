document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('modif_info');
    const enregistrerButton = document.getElementById("enregistrer_button");
    const statusMessage = document.getElementById("status-message");

    if (!form || !enregistrerButton) return;

    form.addEventListener("submit", function (e) {
        e.preventDefault();
    });

    enregistrerButton.addEventListener("click", function () {
        const formData = new FormData(form);
        const params = new URLSearchParams(formData).toString();

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "Modif_informations.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    try {
                        const data = JSON.parse(xhr.responseText);
                        if (statusMessage) {
                            statusMessage.textContent = data.message;
                            statusMessage.classList.toggle('error', !data.success);
                        }
                        if (data.success) {
                            // Remettre les champs en lecture seule
                            Array.from(form.elements).forEach(el => el.disabled = true);
                            enregistrerButton.style.display = "none";
                            document.getElementById("annuler_button").style.display = "none";
                            document.getElementById("modif_button").style.display = "inline-block";
                        }
                    } catch (e) {
                        if (statusMessage) {
                            statusMessage.textContent = "Réponse JSON invalide.";
                            statusMessage.classList.add('error');
                        }
                    }
                } else {
                    if (statusMessage) {
                        statusMessage.textContent = "Erreur de connexion au serveur.";
                        statusMessage.classList.add('error');
                    }
                }
            }
        };

        xhr.send(params);
    });
});
