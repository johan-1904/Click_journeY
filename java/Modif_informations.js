function Bouton(){

	const formulaire = document.getElementById('modif_info');
	const boutonModifier = document.getElementById('modif_button');
	const boutonAnnuler = document.getElementById('annuler_button');
	Array.from(formulaire.elements).forEach(element => {
		element.disabled = true;
	});
	boutonModifier.addEventListener('click', () => {
	   	Array.from(formulaire.elements).forEach(element => {
	     		element.disabled = false;
	     	});
	});
	boutonAnnuler.addEventListener('click', () => {
		location.reload();
	});
}
