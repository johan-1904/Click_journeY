<?php
session_start();
require('fonctions.php');

include('getapikey.php');
$transaction =  genererTransaction(10, 24);
$montant = 1645;
$vendeur = 'MI-1_C';
$retour = 'http://localhost:5454/retour.php';
$api_key = getAPIKey($vendeur);


$control = md5($api_key . "#" . $transaction . "#" . $montant . "#" . $vendeur . "#" . $retour . "#");


?>


<!DOCTYPE html>
<html>
<head>
    <title>TrekDream</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/paiement.css">
</head>

<body>	
        <?php
		bandeau($_SESSION["prenom"]);
	?>
	<div class="payer">
		<h2>Récapitulatif de votre voyage</h2>
       	 	<p><strong>Numéro de transaction :</strong> <?= $transaction ?></p>
        	<p><strong>Montant :</strong> <?= number_format($montant, 2, ',', ' ') ?> €</p>
		<form action="https://www.plateforme-smc.fr/cybank/" method="POST">
			<input type="hidden" name="transaction" value="<?=  $transaction ?>">
			<input type="hidden" name="montant" value="<?= $montant ?>">
			<input type="hidden" name="vendeur" value="<?= $vendeur ?>">
			<input type="hidden" name="retour" value="<?= $retour ?>">
			<input type="hidden" name="control" value="<?= $control ?>">
			<button type="submit"> Valider et payer </button>
			
		</form>
	</div>
<footer>
    <p>© 2025 DreamTrek - Searching Page</p>
</footer>
</body>
</html>
