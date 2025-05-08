
function mettreAJourPrix() {
    const tarifBase = parseFloat(document.getElementById("tarifBase").value) || 0;
    const nb = parseInt(document.getElementById("nb_personnes").value) || 1;
    const checkboxes = document.querySelectorAll('input[name="options[]"]:checked');
     let totalOptions = 0;
   

    checkboxes.forEach(cb => {
        totalOptions += parseFloat(cb.value);
    });

    const totalFinal = (totalOptions + tarifBase) * nb;
    document.getElementById("prixOptions").textContent = totalFinal.toFixed(2) + " €";
 
}
   window.addEventListener("DOMContentLoaded", mettreAJourPrix);



