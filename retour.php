<?php
	session_start();
	require('fonctions.php');
	anonyme($_SESSION["prenom"]);	
	bandeau($_SESSION["prenom"]); 

$voyage = $_GET["voyage_actuel"] ?? "inconnu";
$statut = $_GET["status"] ?? "inconnu";
$transaction = $_GET["transaction"] ?? "non spécifiée";
$montant = $_GET["montant"] ?? "inconnu";



function est_accepte($statut){
	if ($statut === "denied") {	
		return False ;
	}
 	elseif ($statut === "accepted") {
    		return TRUE;
	}
}

?>



<!DOCTYPE html>
<html>
<head> 
    <title>Confirmation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="CSS/retour.css">
    <link rel="stylesheet" href="CSS/Bandeau.css">
		
</head>
<body>
	<div class="test">
        	<?php if (est_accepte($statut)): ?>
           		<h2>Paiement confirmé ✅</h2>
            		<p><strong>Voyage :</strong> <?= htmlspecialchars($voyage) ?></p>
            		<p><strong>Numéro de transaction :</strong> <?= htmlspecialchars($transaction) ?></p>
            		<p><strong>Montant payé :</strong> <?= number_format((float)$montant, 2, ',', ' ') ?> €</p>
            		<p>Merci pour votre achat ! Vous recevrez bientôt une confirmation par e-mail.</p>
       		<?php else: ?>
            		<h2>Paiement échoué </h2>
            		<p>Votre transaction a été refusée par l'opérateur bancaire.</p>
            		<p>Veuillez réessayer ou utiliser un autre moyen de paiement.</p>
            		<a href="paiement.php?voyage_actuel=<?= urlencode($voyage) ?>">
                		<button>Retourner à la page de paiement</button>
            		</a>
        	<?php endif; ?>
	</div>

<footer>
    <p>© 2025 DreamTrek - Statut</p>
</footer>
</body>
</html>