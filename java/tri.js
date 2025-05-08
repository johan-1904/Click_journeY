        document.addEventListener('DOMContentLoaded', function() {

		const container = document.querySelector('#liste-treks');
        	const aucun = Array.from(container.children);
       	 	document.getElementById('tri').addEventListener('change', function () {
        	const critere = this.value;
        

        	if (!critere) {

		    container.innerHTML = '';
        	    aucun.forEach(trek => container.appendChild(trek));
        	    return;
        	}

        	const treks = Array.from(document.querySelectorAll('.Resultat'));

        	console.log(`Tri par : ${critere}`);  

       		treks.sort((a, b) => {

       			let valeur1, valeur2;
       			if (critere === 'tarif') {
	    			valeur1 = parseFloat(a.dataset.tarif);
            			valeur2 = parseFloat(b.dataset.tarif);
       	    			return valeur1 - valeur2;
    			}
	
			if (critere === 'tarifdecroiss') {
            			valeur1 = parseFloat(a.dataset.tarif);
           			valeur2 = parseFloat(b.dataset.tarif);
            			return valeur2 - valeur1;  // décroissant
    			}

    			if (critere === 'date') {
            			valeur1 = new Date(a.dataset.date);
            			valeur2 = new Date(b.dataset.date);
            			return valeur1 - valeur2;
    			}

        		// tri alphabétique
        		valeur1 = a.dataset[critere];
        		valeur2 = b.dataset[critere];
        		return valeur1.localeCompare(valeur2);
		});



        	container.innerHTML = '';         
 		treks.forEach(trek => container.appendChild(trek));     
		});
	});