
function supprimerTrek(index) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "supprimer_panier.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onload = function() {
        if (xhr.status == 200) {
            document.getElementById("trek-" + index).remove();
        }
    };

    xhr.send("index=" + index);
}
