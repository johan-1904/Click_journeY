<?php
require('fonctions.php');
session_start();
bandeau($_SESSION["prenom"]);
$json = file_get_contents("voyages.json");
$treks = json_decode($json, true);

$filtre_pays = $_GET["pays"] ?? "";


function affichervoyages($trek) {
    echo "<img src='" . htmlspecialchars($trek["image"]) . "' alt='Image du trek' class='dbt1'>";
    echo '<h3 class="txt"><strong>' . htmlspecialchars($trek["pays"]) . '</strong></h3>';
}


?>

<!DOCTYPE html>
<html>
<head>
   
    <title>Nos voyages</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="CSS/voyages.css">
    <link rel="stylesheet" href="CSS/Bandeau.css">
</head>
<body>
    <div class="image-texte">
        <img class="image" src="https://4kwallpapers.com/images/wallpapers/palm-tree-desert-sand-dunes-clear-sky-shadow-sunny-day-3440x1440-6432.png" alt="Paysage du Maroc"/>
        <h2 class="texte"><I> nous réalisons tous vos rêves de voyage </I></h2>
    </div>
    
    
    <form action="" method="GET">
    	<div class="search-container">
        	<input type="text" name="pays" id="filtre-pays" class="search-input" placeholder="Rechercher une destination par pays..." value="<?= htmlspecialchars($filtre_pays) ?>">
   	</div>
    </form>
    <div class="double-voyage">
            <?php
            	$resultats_affiches = false;

            	foreach ($treks as $trek) {
            		$match_pays = empty($filtre_pays) || stripos($trek["pays"], $filtre_pays) !== false;
            		echo "<div class='voyage'>";
            		if ($match_pays) {
                    		affichervoyages($trek);
                    		$resultats_affiches = true;
                    		echo "</div>";
                	}
            	}

            	
            
            ?>
        
    </div>
    <?php
    	if (!$resultats_affiches) {
        	echo "<h3>Aucun trek ne correspond aux critères.</h3>";
        }
    ?>
        
</body>
</html>

