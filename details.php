<?php
session_start();
require('fonctions.php');



$json = file_get_contents("voyages.json");
$data = json_decode($json, true);
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$detail = null;
foreach ($data as $voyage) {
    if ($voyage['id'] == $id) { 
        $detail = $voyage;
        break;
    }
}


?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title><?= htmlspecialchars($detail['nom']); ?></title>
    <link rel="stylesheet" href="CSS/details.css">
    <link rel="stylesheet" href="CSS/Bandeau.css">
    
</head>
<body>
    <?php 
	bandeau($_SESSION["prenom"]); 
    ?>
    <img src="<?= htmlspecialchars($detail['image_url']); ?>" alt="<?= htmlspecialchars($detail['nom']); ?>" class="image">

    <div class="content">
        <h1><?= htmlspecialchars($detail['nom']); ?></h1>
	<div class="ligne"></div>
        <section class="description">
            <p><?= nl2br(htmlspecialchars($detail['description'])); ?></p>
        </section>

        <section class="details">
            <h2>Caractéristiques</h2>
            <p>Difficulté : <?= htmlspecialchars($detail['difficulte']); ?></p>
            <p>Nombre d'étapes : <?= htmlspecialchars($detail['nb_etapes']); ?></p>
            <p>Durée : <?= htmlspecialchars($detail['duree']); ?></p>
            <p>Date : <?= htmlspecialchars($detail['date']); ?></p>
            <p>À partir de <?= htmlspecialchars($detail['tarif']); ?> €</p>
            <p>Moyen de transport : <?= htmlspecialchars($detail['transport']); ?></p>
        </section>
	</div>
	<h2 class="titre_etape">Etapes</h2>	
		
    			<?php afficher_etape($id); ?>
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["calculer"])) {
   			 $total = 0;

    		if (!empty($_POST["options"])) {
        		foreach ($_POST["options"] as $prix_option) {
           		 $total += intval($prix_option);
       		 }
    	   }

    echo "<p>Prix total des options sélectionnées : <strong>$total €</strong></p>";
}
	?>
    

</body>
</html>
