<?php
session_start();
require('fonctions.php');


$json = file_get_contents("voyages.json");
$treks = json_decode($json, true);

$filtre_region = $_GET["region"] ?? "";
$filtre_date = $_GET["date"] ?? "";
$filtre_difficulte = $_GET["difficulte"] ?? "";
$filtre_tarif = $_GET["tarif"] ?? "";

$recherche_active = !empty($filtre_region) || !empty($filtre_date) || !empty($filtre_difficulte) || !empty($filtre_tarif);


function afficherTrek($trek) {
    echo "<div class='Resultat'>";
    echo "<img src='" . htmlspecialchars($trek["image"]) . "' alt='Image du trek' class='trek-image'>";
    echo "<div class='info'>";
    echo "<strong>" . htmlspecialchars($trek["nom"]) . "</strong> - " . htmlspecialchars($trek["pays"]);
    echo " - " . htmlspecialchars($trek["date"]) . " - Difficulté: " . htmlspecialchars($trek["difficulte"]);
    echo " - Tarif: " . htmlspecialchars($trek["tarif"]) . "€";
    echo "<br><a href='" . htmlspecialchars($trek["lien"]) . "' class='details'>Voir plus</a>";
    echo "</div>";
    echo "</div>";
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>TrekDream</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/filtre.css">
</head>
<body>
	<?php
    	bandeau($_SESSION["prenom"]);
    	?>
<div class="filtre">	
    <div class="contenu">
        <h2>Rechercher un trek</h2>

        <!-- Formulaire qui envoie les filtres en GET -->
       

	 <form action="filtre.php" method="GET">
            <label for="filtre-region">Région :</label>
            <input type="text" name="region" id="filtre-region" placeholder="Ex: Désert, Montagne..." value="<?= htmlspecialchars($filtre_region) ?>">
            
            <label for="filtre-date">Date :</label>
            <input type="date" name="date" id="filtre-date" value="<?= htmlspecialchars($filtre_date) ?>">
            
            <label for="filtre-difficulte">Difficulté :</label>
            <select name="difficulte" id="filtre-difficulte">
                <option value="" <?= $filtre_difficulte == "" ? "selected" : "" ?>>Aucune</option>
                <option value="Facile" <?= $filtre_difficulte == "Facile" ? "selected" : "" ?>>Facile</option>
                <option value="Moyenne" <?= $filtre_difficulte == "Moyenne" ? "selected" : "" ?>>Moyenne</option>
                <option value="Difficile" <?= $filtre_difficulte == "Difficile" ? "selected" : "" ?>>Difficile</option>
            </select>
            
            <label for="filtre-tarif">Budget :</label>
            <input type="number" name="tarif" id="filtre-tarif" placeholder="Ex: 500€" value="<?= htmlspecialchars($filtre_tarif) ?>">
            
            <button type="submit">Rechercher</button>
            <button type="button" onclick="window.location.href=window.location.pathname;">Réinitialiser</button>

        </form>
        

        <!-- Résultats filtrés -->


       
            <?php
		if ($recherche_active): 
	    ?>
            <h3>Résultats :</h3>
            <div id="liste-treks">
                
	<?php
            $resultats_affiches = false;

            foreach ($treks as $trek) {
                $match_region = empty($filtre_region) || stripos($trek["region"], $filtre_region) !== false;
                $match_date = empty($filtre_date) || $trek["date"] == $filtre_date;
                $match_difficulte = empty($filtre_difficulte) || $trek["difficulte"] == $filtre_difficulte;
                $match_tarif = empty($filtre_tarif) || $trek["tarif"] <= $filtre_tarif;

                if ($match_region && $match_date && $match_difficulte && $match_tarif) {
                    afficherTrek($trek);
                    $resultats_affiches = true;
                }
            }

            if (!$resultats_affiches) {
                echo "<p>Aucun trek ne correspond aux critères.</p>";
            }
            ?>
        </div>
	<?php
	    endif;
 	?>
    </div>
</div>
<footer>
    <p>© 2025 DreamTrek - Searching Page</p>
</footer>
</body>
</html>
