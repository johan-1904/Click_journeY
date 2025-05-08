<!DOCTYPE html>
<?php
	session_start();
	require('fonctions.php');
	anonyme($_SESSION["prenom"]);	
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - DreamTrek</title>
    <link rel="stylesheet"  type="text/css" href="CSS/admin.css">
    <script src="java/admin.js"></script> 
</head>
<body>
  
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
</body>
</html>
