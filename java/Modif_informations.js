
document.addEventListener('DOMContentLoaded', function() {
	const form = document.getElementById('modif-info');
	const prenom = form.querySelector('input[name="prenom"]').placeholder;
	const nom = form.querySelector('input[name="nom"]').placeholder;
	const email = form.querySelector('input[name="email"]').placeholder;
    const numero = form.querySelector('input[name="numero"]').placeholder;
	const adresse = form.querySelector('input[name="adresse"]').placeholder;

	const xhr = new XMLHttpRequest();
    xhr.open("POST", "Modif_informations.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                setTimeout(() => {                          
            	}, 500);
			}
        } 
    };
	const params = "email=" + encodeURIComponent(email) + "&prenom=" + encodeURIComponent(prenom) + "&nom=" + encodeURIComponent(nom) + "&adresse=" + encodeURIComponent(adresse) + "&numero=" + encodeURIComponent(numero);
    xhr.send(params);
});