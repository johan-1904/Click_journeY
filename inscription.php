<!DOCTYPE html>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="CSS/Style.css">
 	<title>Créer un compte</title>
</head>
<body class="inscription" id="inscription">
	<img class="logo" src="logo.png" alt="logo">
	<form action="check_sign_in.php" method="POST">
		<h4>INSCRIPTION</h4>
		<hr>
		<div class="name_field">
			<div>
				<label>Prénom</label>
				<input name="prenom" type="text">		
			</div>
			<div>	
				<label>Nom</label>
				<input name="nom" type="text">
			</div>
		</div>	
		<label>Adresse Mail</label>
		<input type="email" name="email">
		<label>Mot de passe</label>
		<input type="password" name="password"/>
		<input class="submit-button" type="submit" value="S'inscrire">
		<p>Vous possédez déjà un compte ? <a href="connexion.php">Se connecter</a></p>
	</form>
<footer>
        <p>© 2025 DreamTrek - Sign in Page</p>
</footer>
</body>
</html>
		
