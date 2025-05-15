<?php
session_start();
require('fonctions.php');

$json1 = file_get_contents("historique.json");
$historiques = json_decode($json1, true);



function afficherTrek1($trek) {
    $destination = $trek["destination"];
    $date_depart = $trek["date_depart"];
    $nb_personnes =$trek["nb_personne"];
    $prix_total = $trek["prix"]; 
    $option = implode (', ', $trek["options"]); ?>
    <div class='Resultat' id='trek-<?= htmlspecialchars($trek["id"]) ?>'>
        <div class='info'>
            <strong><?= htmlspecialchars($trek["destination"]) ?></strong>
            - <?= htmlspecialchars($trek["date_depart"]) ?> - Nombre de personne: <?= htmlspecialchars($trek["nb_personne"]) ?>
            - Prix: <?= htmlspecialchars($trek["prix"]) ?>€
          <br><form action="detail_historique.php" method="POST">
  		  <input type="hidden" name="prix" value="<?= $prix_total ?>">
 		  <input type="hidden" name="destination" value="<?= $destination ?>">
  		  <input type="hidden" name="date_depart" value="<?= $date_depart ?>">
   		  <input type="hidden" name="nb_personnes" value="<?= $nb_personnes ?>">
		  <input type="hidden" name="prix" value="<?= $prix_total ?>">
		  <input type="hidden" name="transaction" value="<?= $trek["transaction"] ?>">
		  <input type="hidden" name="options" value="<?= $option ?>">
			
                 <button type="submit" class="details">Détails</button>
	</form>



        </div>
    </div>
<?php }

?>

<!DOCTYPE html>
<html>
<head>
    <title>TrekDream</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/Bandeau.css">
    <link id="css" rel="stylesheet" type="text/css" href="CSS/panier.css">
</head>
<body>

<div class="panier">
<h1>Mon historique</h1>
<?php
	    bandeau($_SESSION["prenom"]);

if(!empty($historiques)){
            foreach($historiques as $historique) {
		if ($historique["email"] == $_SESSION["email"]) {     
                    afficherTrek1($historique);
                }
      	}
}
?>
</div>
<footer>
    <p>© 2025 DreamTrek - Historique</p>
</footer>
<script src="scipt.js"></script>
</body>
</html>
