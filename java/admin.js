function simulateBan(button) {
   const estBanni = button.dataset.etat === 'banni';

    button.textContent = 'En cours...';
    button.disabled = true;
    button.style.backgroundColor = 'gray';

    setTimeout(() => {
        if (estBanni) {
           
            button.textContent = 'Bannir';
            button.style.backgroundColor = 'red';
            button.dataset.etat = 'debanni';
        } else {
           
            button.textContent = 'Débannir';
            button.style.backgroundColor = 'red';
            button.dataset.etat = 'banni';
        }
        button.disabled = false;
    }, 1000);
}