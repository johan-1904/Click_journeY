document.addEventListener('DOMContentLoaded', () => {
    const link = document.getElementById('css'); // Lien vers la feuille de style
    const toggleButton = document.getElementById('theme-toggle'); 

  
    const page = window.location.pathname.split('/').pop().split('.')[0]; 

    
    let darkMode = localStorage.getItem('theme') === 'dark';

   
    if (!localStorage.getItem('theme')) {
        localStorage.setItem('theme', 'light');
        darkMode = false;
    }

    
    link.href = `CSS/${page}${darkMode ? 'Dark' : ''}.css`;

    
    if (toggleButton) {
        toggleButton.textContent = darkMode ? 'Mode clair' : 'Mode sombre'; 

        toggleButton.addEventListener('click', () => {
            darkMode = !darkMode; 
            localStorage.setItem('theme', darkMode ? 'dark' : 'light'); 

            
            link.href = `CSS/${page}${darkMode ? 'Dark' : ''}.css`;
            toggleButton.textContent = darkMode ? 'Mode clair' : 'Mode sombre';
        });
    }
});
