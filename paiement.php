<!DOCTYPE html>
<html>
<head>
    <title>TrekDream</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/paiement.css">
    <link rel="stylesheet" type="text/css" href="CSS/Bandeau.css">
</head>

<body>	
	<div class="payer">
		<h1>Récapitulatif de votre voyage </h2><br>
		<p><strong>Merci de bien vérifier les informations ci-dessous.</strong></p><br>
       	 	<p><strong>Destination :</strong> <?= htmlspecialchars($destination) ?></p>
		<p><strong>Date de départ :</strong> <?= htmlspecialchars($date) ?></p>
		<p><strong>Nombre de personnes :</strong> <?= htmlspecialchars($nb_personnes) ?></p>
		<p><strong>Numéro de transaction :</strong> <?= $transaction ?></p>
		
        	<p><strong>Total :</strong> <?= number_format($montant, 2, ',', ' ') ?> €</p>
		
		<form action="https://www.plateforme-smc.fr/cybank/" method="POST">
			<input type="hidden" name="transaction" value="<?=  $transaction ?>">
			<input type="hidden" name="montant" value="<?= $montant ?>">
			<input type="hidden" name="vendeur" value="<?= $vendeur ?>">
			<input type="hidden" name="retour" value="<?= $retour ?>">
			<input type="hidden" name="control" value="<?= $control ?>">
			<input type="hidden" name="voyage" value="<?= $voyage ?>">
			<button type="submit"> Valider et payer </button>
			
		</form>
	</div>
<footer>
    <p>© 2025 DreamTrek - Searching Page</p>
</footer>
</body>
</html>
