<?php
session_start();
require('fonctions.php');
anonyme($_SESSION["prenom"]);
bandeau($_SESSION["prenom"]);

	
$voyage =  $_POST["voyage_actuel"] ??  "inconnu";
$destination = $_POST["destination"] ?? "inconnu";
$date = $_POST["date_depart"] ?? "inconnue";
$prix = $_POST["prix"] ?? 0;
$nb_personnes = $_POST["nb_personnes"] ?? 0;
$transaction = $_POST["transaction"] ?? 0;
$option = $_POST["options"] ?? 0;





?>


<!DOCTYPE html>
<html>
<head>
    <title>TrekDream</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/Bandeau.css">
    <link id="css" rel="stylesheet" type="text/css" href="CSS/detail_historique.css">
</head>

<body>	
	<div class="payer">
		<h1>Détails de votre voyage </h1><br>
		<p><strong>Vous trouverez les détails de votre voyage ci-dessous</strong></p><br>
       	 	<p><strong>Destination :</strong> <?= htmlspecialchars($destination) ?></p>
       	 	<?php 
       	 	if(empty($option)){
       	 			echo "<p><strong>Options sélectionnées :</strong> Aucune option séléctionnée</p>";
		}
       	 	else{
       	 		echo "<p><strong>Options sélectionnées :</strong> " . htmlspecialchars($option) . "</p>";
       	 	}
       	 	?>
		<p><strong>Date de départ :</strong> <?= htmlspecialchars($date) ?></p>
		<p><strong>Nombre de personnes :</strong> <?= htmlspecialchars($nb_personnes) ?></p>
		<p><strong>Numéro de transaction :</strong> <?= $transaction ?></p>
        	<p><strong>Total :</strong> <?= number_format($prix, 2, ',', ' ') ?> €</p>
		
		
		
	</div>
<footer>
    <p>© 2025 DreamTrek - Details</p>
</footer>
<script src="scipt.js"></script>
</body>
</html>
