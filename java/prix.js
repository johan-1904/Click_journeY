function mettreAJourPrix() {


    const tarifBase = parseFloat(document.getElementById("tarifBase").value) || 0;
    const nb = parseInt(document.getElementById("nb_personnes").value) || 1;
    const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
    let totalOptions = 0;

    checkboxes.forEach(cb => {
        totalOptions += parseFloat(cb.value);
    });

    const totalFinal = (totalOptions + tarifBase) * nb;
    
    
    document.getElementById("prixOptions").textContent = totalFinal.toFixed(2) + " €";
    document.getElementById("prix_total_input").value = totalFinal.toFixed(2);

    
    const requete = new XMLHttpRequest();
    requete.open("POST", "/sauver-prix.php", true); 
    requete.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    requete.onreadystatechange = function () {
        if (requete.readyState === 4 && requete.status === 200) {
            console.log("Réponse du serveur :", totalFinal.toFixed(2));
        }
    };

    const params = "prix_total=" + encodeURIComponent(totalFinal.toFixed(2));
    requete.send(params);
}

window.addEventListener("DOMContentLoaded", mettreAJourPrix)

