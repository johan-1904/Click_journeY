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

header("Location: paiement.php");
exit;
?>