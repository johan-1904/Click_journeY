<?php
	session_start();
	require('fonctions.php');


if (!isset($_GET["transaction"])) {
        header("Location: Présentation.php");
    exit();
}

	anonyme($_SESSION["prenom"]);	
	bandeau($_SESSION["prenom"]); 


$statut = $_GET["status"] ?? "inconnu";
$transaction = $_GET["transaction"] ?? "non spécifiée";
$montant = $_GET["montant"] ?? "inconnu";


	$content=file_get_contents('panier.json');
	$paniers = json_decode(file_get_contents('panier.json'), true);
	$historiques = json_decode(file_get_contents('historique.json'), true);
	

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
        <?php 
		if (est_accepte($statut)): 
			$nouveaux_paniers = [];
			foreach($paniers as $historique){
				if($historique["transaction"]==$transaction){		
					$historiques[] = [

   						"destination" => $historique['destination'],
   						"email" => $historique['email'],
    						"nb_personne" => $historique['nb_personne'],
    						"prix" => $historique['prix'],
    						"date_depart" => $historique['date_depart'],
    						"options" => $historique['options'],
						"transaction" =>$historique['transaction']

    					];
					?>
					<h2>Paiement confirmé ✅</h2>
            				<p><strong>Voyage :</strong> <?= htmlspecialchars($historique['destination']) ?></p>
					<p><strong>Numéro de transaction :</strong> <?= htmlspecialchars($transaction) ?></p>
            				<p><strong>Montant payé :</strong> <?= number_format((float)$montant, 2, ',', ' ') ?> €</p>
            				<p>Merci pour votre achat ! Vous recevrez bientôt une confirmation par e-mail.</p>
					<?php
				}
				else {
                      			 $nouveaux_paniers[] = $historique;
        			}
			}
			file_put_contents('historique.json', json_encode($historiques, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
			file_put_contents('panier.json', json_encode($nouveaux_paniers, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
			?>
       		<?php else: ?>
            		<h2>Paiement échoué </h2>
            		<p>Votre transaction a été refusée par l'opérateur bancaire, vous retrouverez votre voyage dans le panier.</p>
            		<p>Veuillez réessayer ou utiliser un autre moyen de paiement.</p>
            		<a href="panier.php">
                		<button>Mon panier</button>
            		</a>
        	<?php endif; ?>
	</div>

<footer>
    <p>© 2025 DreamTrek - Statut</p>
</footer>
</body>
</html>