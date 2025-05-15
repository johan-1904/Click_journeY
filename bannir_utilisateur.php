<?php
if (!isset($_POST["email"]) || !isset($_POST["banni"])) {
    header("Location: admin.php?erreur=parametres");
    exit;
}

$email = $_POST["email"];
$etat_banni = $_POST["banni"];

$fichier = 'users_database.json';
$contenu = file_get_contents($fichier);
$users = json_decode($contenu, true);

$modifie = false;

foreach ($users as &$user) {
    if ($user["email"] === $email) {
        $user["banni"] = $etat_banni;
        $modifie = true;
        break;
    }
}
unset($user);

if ($modifie) {
    file_put_contents($fichier, json_encode($users, JSON_PRETTY_PRINT));
    header("Location: admin.php");
    exit;
} else {
    header("Location: admin.php?erreur=utilisateur_introuvable");
    exit;
}
