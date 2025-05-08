<?php
require('fonctions.php');
session_start();
bandeau($_SESSION["prenom"]);

$json = file_get_contents("voyages.json");
$treks = json_decode($json, true);

$filtre_pays = $_GET["pays"] ?? "";

$categories = [
    "Nos clients ont aimé !" => array_slice($treks, 0, 3),
    "Découvrez en d'autres !" => array_slice(array_slice($treks, 3), 0, 3)
];

function affichervoyages($trek) {
    echo "<a href='" . htmlspecialchars($trek["lien"]) . "'>";
    echo "<img src='" . htmlspecialchars($trek["image"]) . "' alt='Image du trek' class='dbt1'>";
    echo "</a>";
    echo '<h3 class="txt"><strong>' . htmlspecialchars($trek["pays"]) . '</strong></h3>';
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nos voyages</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

   
    <link id="css" rel="stylesheet" href="CSS/voyages.css">
    <link rel="stylesheet" href="CSS/Bandeau.css">
</head>
<body>

    
    <button id="theme-toggle">Changer de thème</button>

    
    <div class="image-texte">
        <img class="image" src="https://4kwallpapers.com/images/wallpapers/palm-tree-desert-sand-dunes-clear-sky-shadow-sunny-day-3440x1440-6432.png" alt="Paysage du Maroc"/>
        <h2 class="texte"><i>nous réalisons tous vos rêves de voyage</i></h2>
    </div>

    
    <?php foreach ($categories as $nom_categorie => $voyages) : ?>
        <?php if (!empty($voyages)) : ?>
            <h2 class="categorie-titre"><?= htmlspecialchars($nom_categorie) ?></h2>
            <div class="double-voyage">
                <?php foreach ($voyages as $trek) : ?>
                    <div class='voyage'>
                        <?php affichervoyages($trek); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>

    
    <script src="scipt.js"></script>
</body>
</html>



