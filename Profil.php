<!DOCTYPE html>
<?php
	session_start();
	require('fonctions.php');
	anonyme($_SESSION["prenom"]);	
?>
	
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	<link id="css" rel="stylesheet" type="text/css" href="CSS/Profil.css">
	<title>Mon compte</title>
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
				<?php
				admin($_SESSION["admin"]);
				?>
				<a href="logout.php" class="menu-link"><i class="fa-solid fa-right-from-bracket menu-icon"></i>Déconnexion</a>
			</div>
		</div>
		<?php
		afficher_paramètres($_SESSION["nom"], $_SESSION["prenom"], $_SESSION["email"], $_SESSION["numero"], $_SESSION["adresse"]);
		?>
	</div>
<footer>
        <p>© 2025 DreamTrek - Profil</p>
</footer>
<script>
document.getElementById('theme-toggle').addEventListener('click', function() {
    const link = document.getElementById('css');
    if (link.getAttribute('href') === 'CSS/Profil.css') {
        link.setAttribute('href', 'CSS/ProfilDark.css');
        this.textContent = 'Mode clair';
    } else {
        link.setAttribute('href', 'CSS/Profil.css');
        this.textContent = 'Mode sombre';
    }
});
</script>
</body>	
</html>	 
	
	
