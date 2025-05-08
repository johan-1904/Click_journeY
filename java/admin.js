function simulateBan(button) {
    button.style.backgroundColor = 'gray';
    button.disabled = true;
    button.textContent = 'En cours...';

    setTimeout(() => {
        button.style.backgroundColor = 'red';
        button.disabled = false;
        button.textContent = 'Bannir';
    }, 1000);
}