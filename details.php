<?php
session_start();
require('fonctions.php');


$json = file_get_contents("voyages.json");
$data = json_decode($json, true);
$detail = $data[0] ?? null;

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title><?= htmlspecialchars($detail['nom']); ?></title>
    <link rel="stylesheet" href="CSS/page_ismael.css">
</head>
<body>
    <?php 
	bandeau($_SESSION["prenom"]); 
    ?>
    <img src="<?= htmlspecialchars($detail['image_url']); ?>" alt="<?= htmlspecialchars($detail['nom']); ?>" class="image">

    <div class="content">
        <h1><?= htmlspecialchars($detail['nom']); ?></h1>

        <section class="description">
            <h3><?= htmlspecialchars($detail['nom']); ?></h3>
            <p><?= nl2br(htmlspecialchars($detail['description'])); ?></p>
        </section>

        <section class="details">
            <h3>Détails</h3>
            <p><strong>Difficulté :</strong> <?= htmlspecialchars($detail['difficulte']); ?></p>
            <p><strong>Nombre d'étapes :</strong> <?= htmlspecialchars($detail['etapes']); ?></p>
            <p><strong>Durée :</strong> <?= htmlspecialchars($detail['duree']); ?></p>
            <p><strong>Date :</strong> <?= htmlspecialchars($detail['date']); ?></p>
            <p><strong>Prix :</strong> <?= htmlspecialchars($detail['tarif']); ?> €</p>
            <p><strong>Moyen de transport :</strong> <?= htmlspecialchars($detail['transport']); ?></p>
        </section>
    </div>

</body>
</html>
