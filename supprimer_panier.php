<?php
session_start();

$index = $_POST['index'] ?? null;

$fichier = 'panier.json';
$donnees = json_decode(file_get_contents($fichier), true);

unset($donnees[$index]);

file_put_contents($fichier, json_encode($donnees, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));