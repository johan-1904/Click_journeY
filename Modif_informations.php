<?php
session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["success" => false, "message" => "Méthode non autorisée"]);
    exit;
}

$usersFile = 'users_database.json';
if (!file_exists($usersFile)) {
    echo json_encode(["success" => false, "message" => "Base de données introuvable."]);
    exit;
}

$users = json_decode(file_get_contents($usersFile), true);

if (!isset($_SESSION["email"])) {
    echo json_encode(["success" => false, "message" => "Utilisateur non connecté."]);
    exit;
}

$ancienEmail = $_SESSION["email"];
$response = ["success" => false, "message" => "Erreur lors de la mise à jour."];

foreach ($users as &$user) {
    if ($user["email"] === $ancienEmail) {

        // Mise à jour si champs non vides
        if (!empty($_POST["prenom"])) {
            $user["prenom"] = $_POST["prenom"];
            $_SESSION["prenom"] = $_POST["prenom"];
        }
        if (!empty($_POST["nom"])) {
            $user["nom"] = $_POST["nom"];
            $_SESSION["nom"] = $_POST["nom"];
        }
        if (!empty($_POST["adresse"])) {
            $user["adresse"] = $_POST["adresse"];
            $_SESSION["adresse"] = $_POST["adresse"];
        }
        if (!empty($_POST["numero"])) {
            $user["numero"] = $_POST["numero"];
            $_SESSION["numero"] = $_POST["numero"];
        }
        if (!empty($_POST["email"])) {
            $user["email"] = $_POST["email"];
        }

        // Enregistrer dans fichier
        if(file_put_contents($usersFile, json_encode($users, JSON_PRETTY_PRINT)) === false) {
            echo json_encode(["success" => false, "message" => "Impossible d'enregistrer."]);
            exit;
        }

        // Mettre à jour la session email après la sauvegarde
        if (!empty($_POST["email"])) {
            $_SESSION["email"] = $_POST["email"];
        }

        $response = ["success" => true];
        break;
    }
}

echo json_encode($response);
exit;