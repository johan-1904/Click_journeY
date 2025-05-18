<!DOCTYPE html>
<?php
    session_start();
    require('fonctions.php');
    anonyme($_SESSION["prenom"]);
?>

<html>
<head>
    <title>Administration - DreamTrek</title>
    <link rel="stylesheet"  type="text/css" href="CSS/admin.css">
    <link id="css" rel="stylesheet" href="CSS/admin.css">


</head>
<body>
    <button id="theme-toggle" class="theme-btn">Mode sombre</button>
            <span id="top">
                  <img class="logo" src="logo.png" alt="logo"/>
            <p class="titre">Control   Pannel</p>
            </span>

    <main>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Rôle</th>
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
        <?php
        affiche_utilisateur();
        ?>

            </tbody>
        </table>
    </main>
    <footer>
        <p>© 2025 DreamTrek - Admin Pannel</p>
    </footer>
<script src="java/admin.js" defer></script> 
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const link = document.getElementById('css'); 
        const toggleButton = document.getElementById('theme-toggle'); 

        let darkMode = localStorage.getItem('theme') === 'dark'; 

        if (!localStorage.getItem('theme')) {
            localStorage.setItem('theme', 'light');
            darkMode = false;
        }

        link.href = darkMode ? 'CSS/adminDark.css' : 'CSS/admin.css'; 
        toggleButton.textContent = darkMode ? 'Mode clair' : 'Mode sombre'; 

        toggleButton.addEventListener('click', () => {
            darkMode = !darkMode; 
            localStorage.setItem('theme', darkMode ? 'dark' : 'light'); 

            link.href = darkMode ? 'CSS/adminDark.css' : 'CSS/admin.css'; 
            toggleButton.textContent = darkMode ? 'Mode clair' : 'Mode sombre';
        });
    });
</script>


</body>
</html>