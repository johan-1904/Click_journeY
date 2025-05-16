<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $prix = $_POST["prix_total"] ?? "0";
    // Tu peux maintenant l'enregistrer, l'afficher, etc.
    echo "Prix reçu : " . $prix . " €";
}
?>
