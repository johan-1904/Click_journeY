<!DOCTYPE html>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="CSS/Style.css">
	<script src="java/Fonctions.js" type="text/javascript"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	
 	<title>Créer un compte</title>
</head>
<body class="inscription" id="inscription">
	<img class="logo" src="logo.png" alt="logo">
	<form action="check_sign_in.php" method="POST" onsubmit="return Verif_informations_inscription()">
		<h4>INSCRIPTION</h4>
		<hr>
		<div class="name_field">
			<div>
				<label>Prénom</label>
				<input id="champ-prenom" name="prenom" type="text">		
			</div>
			<div>	
				<label>Nom</label>
				<input id="champ-nom" name="nom" type="text">
			</div>
		</div>	
		<label>Adresse Mail</label>
		<input id="champs-email" type="email" name="email">
		<label>Mot de passe</label>
		
		<div class="motdepasse">
		
			<input id="champ-motdepasse" type="password" name="password" maxlength="16" required/>
			<button type="button" id="affichage_motdepasse" class="affichage_motdepasse">
			<i class="fa-solid fa-eye"></i>
			</button>
			<p id="compteur-mdp">0/16</p>
		</div>
		<input class="submit-button" type="submit" value="S'inscrire">
		<p>Vous possédez déjà un compte ? <a href="connexion.php">Se connecter</a></p>
	</form>
<footer>
        <p>© 2025 DreamTrek - Sign in Page</p>
</footer>
</body>
</html>
		
