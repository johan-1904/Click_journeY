function mettreAJourPrix() {
    const tarifBase = parseFloat(document.getElementById("tarifBase").value) || 0;
    const nb = parseInt(document.getElementById("nb_personnes").value) || 1;
    const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
    
    let options = [];
    checkboxes.forEach(cb => {
        options.push(cb.value);
    });

    const requete = new XMLHttpRequest();
    requete.open("POST", "sauver-prix.php", true);
    requete.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    requete.onreadystatechange = function () {
        if (requete.readyState === 4 && requete.status === 200) {
            const response = JSON.parse(requete.responseText);
            document.getElementById("prixOptions").textContent = response.prix + " €";
            document.getElementById("prix_total_input").value = response.prix;
            console.log("Total calculé par le serveur :", response.prix);
        }
    };

    const params = "tarif_base=" + encodeURIComponent(tarifBase)
                + "&nb_personnes=" + encodeURIComponent(nb)
                + "&options=" + encodeURIComponent(JSON.stringify(options));

    requete.send(params);
}

window.addEventListener("DOMContentLoaded", mettreAJourPrix);