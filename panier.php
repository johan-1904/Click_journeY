<?php
session_start();
require('fonctions.php');

$json1 = file_get_contents("panier.json");
$paniers = json_decode($json1, true);



function afficherTrek1($trek) { ?>
    <div class='Resultat' id='trek-<?= htmlspecialchars($trek["id"]) ?>'>
        <div class='info'>
            <strong><?= htmlspecialchars($trek["destination"]) ?></strong>
            - <?= htmlspecialchars($trek["date_depart"]) ?> - Nombre de personne: <?= htmlspecialchars($trek["nb_personne"]) ?>
            - Prix: <?= htmlspecialchars($trek["prix"]) ?>€
            <br><a href=# class='details'>Supprimer</a>
            <br><a href="paiement.php?prix=<?= urlencode($trek['prix']) ?>" class='details'>Passer au paiement</a>


        </div>
    </div>
<?php }

?>

<!DOCTYPE html>
<html>
<head>
    <title>TrekDream</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/panier.css">
    <link rel="stylesheet" type="text/css" href="CSS/Bandeau.css">
</head>
<body>

<div class="panier">
<h1>Mon panier</h1>
<?php
	    bandeau($_SESSION["prenom"]);

            foreach($paniers as $panier) {
		if ($panier['email'] === $_SESSION["email"]) {     
                    afficherTrek1($panier);
                }
      	}
?>
</div>
<footer>
    <p>© 2025 DreamTrek - Panier</p>
</footer>
</body>
</html>
