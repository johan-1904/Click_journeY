<?php
require('fonctions.php');

include('getapikey.php');
$transaction = '1234567890ABCDEF';
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
    <link rel="stylesheet" type="text/css" href="CSS/filtre.css">
</head>

<body>	
    <div class="filtre">
        <?php
           bandeau('utilisateur');
        ?>
	<div class="payer">
		<form action="https://www.plateforme-smc.fr/cybank/" method="POST">
			<input type="hidden" name="transaction" value="<?=  $transaction ?>">
			<input type="hidden" name="montant" value="<?= $montant ?>">
			<input type="hidden" name="vendeur" value="<?= $vendeur ?>">
			<input type="hidden" name="retour" value="<?= $retour ?>">
			<input type="hidden" name="control" value="<?= $control ?>">
			<input type="submit" value="Valider et payer">
		</form>
	</div>
   </div>
</body>
<footer>
    <p>© 2025 DreamTrek - Searching Page</p>
</footer>
</body>
</html>
