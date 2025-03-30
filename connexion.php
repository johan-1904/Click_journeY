<!DOCTYPE html>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="CSS/Style.css">
 	<title>Se connecter</title>
</head>
<body class="connexion">
	<img class="logo" src="logo.png" alt="logo">
	<form action="check_connect.php" method="POST">
		<h4>CONNEXION</h4>
		<hr>
		<label>Adresse Mail</label>
		<input type="email" name="email">
		<label>Mot de passe</label>
		<input type="password" name="password"/>
		<input class="submit-button" type="submit" value="Se connecter">
		<p>Vous n'avez pas encore de compte ? <a href="inscription.php">S'inscrire</a></p>
	</form>
<footer>
        <p>© 2025 DreamTrek - Login Page</p>
</footer>
</body>
</html>

