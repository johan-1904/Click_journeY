<?php
session_start();


if (!isset($_POST['destination'], $_POST['email'], $_POST['prix_total'], $_POST['date_depart'], $_POST['nb_personnes'])) {
    die("Données manquantes.");
}


$newItem = [
    "destination" => $_POST['destination'],
    "email" => $_POST['email'],
    "nb_personne" => $_POST['nb_personnes'],
    "prix" => $_POST['prix_total'],
    "date_depart" => $_POST['date_depart']
];


$fichier = 'panier.json';
$panier = file_exists($fichier) ? json_decode(file_get_contents($fichier), true) : [];


$panier[] = $newItem;


file_put_contents($fichier, json_encode($panier, JSON_PRETTY_PRINT));
$destination =$_POST['destination'];
$date_depart = $_POST['date_depart'];
$nb_personnes = $_POST['nb_personnes'];
$prix_total = $_POST['prix_total'];
?>
<br><form id="redirection" action="paiement.php" method="POST">
  		  <input type="hidden" name="prix" value="<?= $prix_total ?>">
 		  <input type="hidden" name="destination" value="<?= $destination ?>">
  		  <input type="hidden" name="date_depart" value="<?= $date_depart ?>">
   		  <input type="hidden" name="nb_personnes" value="<?= $nb_personnes ?>">
	</form>
	<script>
        document.getElementById('redirection').submit();
    	</script>
<?	
exit;
?>
