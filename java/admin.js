
window.bannir = function(button) {
    const form = button.closest('form');
    const estBanni = button.dataset.etat === 'banni';

    button.textContent = 'En cours...';
    button.disabled = true;
    button.style.backgroundColor = 'gray';

    setTimeout(() => {
        if (estBanni) {
            button.textContent = 'Bannir';
            button.style.backgroundColor = '#ff4444';
            button.dataset.etat = 'debanni';
            form.querySelector('input[name="banni"]').value = 'non';
        } else {
            button.textContent = 'Débannir';
            button.style.backgroundColor = '#44c767';
            button.dataset.etat = 'banni';
            form.querySelector('input[name="banni"]').value = 'oui';
        }
form.submit();
    }, 1000);
}