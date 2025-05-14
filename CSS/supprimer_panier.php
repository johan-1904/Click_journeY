<?php
session_start();

$index = $_POST['index'];

$fichier = 'panier.json';
$donnees = json_decode(file_get_contents($fichier), true);
unset($donnees[$index]);


$donnees = array_values($donnees);


file_put_contents($fichier, json_encode($donnees, JSON_PRETTY_PRINT));

?>