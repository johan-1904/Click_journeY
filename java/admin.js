window.bannir = function(button) {
    const form = button.closest('form');
    const email = form.querySelector('input[name="email"]').value;
    const estBanni = button.dataset.etat === 'banni';
    const nouveauStatut = estBanni ? 'non' : 'oui';
    button.textContent = 'En cours...';
    button.disabled = true;
    button.style.backgroundColor = 'gray';

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "bannir_utilisateur.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                setTimeout(() => {
                    button.disabled = false;

                    if (response.statut === "ok") {
                        if (response.banni === "oui") {
                            button.textContent = "Débannir";
                            button.style.backgroundColor = "#44c767";
                            button.dataset.etat = "banni";
                            form.querySelector('input[name="banni"]').value = "oui";
                        } else {
                            button.textContent = "Bannir";
                            button.style.backgroundColor = "#ff4444";
                            button.dataset.etat = "debanni";
                            form.querySelector('input[name="banni"]').value = "non";
                        }
                    }
                }, 500); 
            } 
        }
    };

    const params = "email=" + encodeURIComponent(email) + "&banni=" + encodeURIComponent(nouveauStatut);
    xhr.send(params);
}
