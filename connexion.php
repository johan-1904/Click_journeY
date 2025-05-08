<!DOCTYPE html>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="CSS/Style.css">
 	<title>Se connecter</title>
	<script src="java/Fonctions.js" type="text/javascript"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="connexion">
	<img class="logo" src="logo.png" alt="logo">
	<form action="check_connect.php" method="POST" onsubmit="return Verif_informations_connexion()">
		<h4>CONNEXION</h4>
		<hr>
		<label>Adresse Mail</label>
		<input type="email" name="email">
		<label>Mot de passe</label>
		<div class="motdepasse">
		
			<input id="champ-motdepasse" type="password" name="password"/>
			<button type="button" id="affichage_motdepasse" class="affichage_motdepasse2">
			<i class="fa-solid fa-eye"></i>
			</button>
		</div>
		<input class="submit-button" type="submit" value="Se connecter">
		<p>Vous n'avez pas encore de compte ? <a href="inscription.php">S'inscrire</a></p>
	</form>
<footer>
        <p>© 2025 DreamTrek - Login Page</p>
</footer>
</body>
</html>

