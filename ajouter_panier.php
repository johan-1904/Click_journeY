<?php
session_start();


if (!isset($_POST['destination'], $_POST['email'], $_POST['prix_total'], $_POST['date_depart'], $_POST['nb_personnes'])) {
    die("Données manquantes.");
}
foreach($_POST as $k => $v){
    if(preg_match('/^\d+-\d+-\d+$/', $k)) {
        $ids_options[] = $k;
    }

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

$json = file_get_contents("voyages.json");
$treks = json_decode($json, true);

foreach($treks as $voyage){
	if($destination == $voyage["nom"]){
		foreach($voyage["etapes"] as $etape){
			foreach($etape["options"] as $option){
				$id_option = $voyage["id"] . '-' . $etape["id"] . '-' . $option["id"];
                		if (in_array($id_option, $ids_options)) {
                			$nom_option[]=$option["nom"];
                		}
                	}
                }
        }
}		
$options_str = implode(',', $nom_option);	
	
?>
<br><form id="redirection" action="paiement.php" method="POST">
  		  <input type="hidden" name="prix" value="<?= $prix_total ?>">
 		  <input type="hidden" name="destination" value="<?= $destination ?>">
  		  <input type="hidden" name="date_depart" value="<?= $date_depart ?>">
   		  <input type="hidden" name="nb_personnes" value="<?= $nb_personnes ?>">
   		   <input type="hidden" name="nom_option" value="<?= $options_str ?>">
	</form>
	<script>
        document.getElementById('redirection').submit();
    	</script>
<?php	
exit;
?>
