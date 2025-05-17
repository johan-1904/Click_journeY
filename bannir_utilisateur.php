

<?php
header("Content-Type: application/json");


$email = $_POST["email"];
$etat_banni = $_POST["banni"];

$fichier = 'users_database.json';

if (!file_exists($fichier)) {
    echo json_encode([
        "statut" => "erreur",
        "message" => "Fichier introuvable"
    ]);
    exit;
}

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
    echo json_encode([
        "statut" => "ok",
        "banni" => $etat_banni
    ]);
} else {
    echo json_encode([
        "statut" => "erreur",
        "message" => "Utilisateur introuvable"
    ]);
}