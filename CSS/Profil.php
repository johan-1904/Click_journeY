<?php
	session_start();
	require('fonctions.php');
	anonyme($_SESSION["prenom"]);	
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mon compte</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	<link id="css" rel="stylesheet" href="CSS/Profil.css"> <!-- Par défaut en mode clair -->
</head>
<body>
	<button id="theme-toggle" class="theme-btn">Mode sombre</button>
	<div class="container">
		<div class="profile">
			<div class="profile-header">
				<img src="logo.png" alt="profile" class="profile-img"/>
				<div class="profile-text-container">
					<h1 class="profile-title">TREAK DREAM</h1><br>
				</div>
			</div>
	
			<div class="menu">
				<a href="#" class="menu-link"><i class="fa-solid fa-user-circle menu-icon"></i>Mon compte</a>
				<a href="#" class="menu-link"><i class="fa-solid fa-bell menu-icon"></i>Notifications</a>
				<a href="#" class="menu-link"><i class="fa-solid fa-gear menu-icon"></i>Paramètres</a>
				<a href="panier.php" class="menu-link"><i class="fa-solid fa-basket-shopping menu-icon"></i>Mon panier</a>
				<a href="historique.php" class="menu-link"><i class="fa-solid fa-clock-rotate-left menu-icon"></i>Historique</a>
				<?php admin($_SESSION["admin"]); ?>
				<a href="logout.php" class="menu-link"><i class="fa-solid fa-right-from-bracket menu-icon"></i>Déconnexion</a>
			</div>
		</div>

		<?php
		// Fonction pour afficher les informations du profil
		afficher_paramètres($_SESSION["nom"], $_SESSION["prenom"], $_SESSION["email"], $_SESSION["numero"], $_SESSION["adresse"]);
		?>
	</div>

	<footer>
		<p>© 2025 DreamTrek - Profil</p>
	</footer>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const link = document.getElementById('css'); 
        const toggleButton = document.getElementById('theme-toggle'); 

        let darkMode = localStorage.getItem('theme') === 'dark'; 

        if (!localStorage.getItem('theme')) {
            localStorage.setItem('theme', 'light');
            darkMode = false;
        }

        link.href = darkMode ? 'CSS/ProfilDark.css' : 'CSS/Profil.css'; 
        toggleButton.textContent = darkMode ? 'Mode clair' : 'Mode sombre'; 

        toggleButton.addEventListener('click', () => {
            darkMode = !darkMode; 
            localStorage.setItem('theme', darkMode ? 'dark' : 'light'); 

            link.href = darkMode ? 'CSS/ProfilDark.css' : 'CSS/Profil.css'; 
            toggleButton.textContent = darkMode ? 'Mode clair' : 'Mode sombre';
        });
    });
</script>


</body>	
</html> 
