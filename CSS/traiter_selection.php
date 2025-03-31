<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $totalPrix = 0;

    if (!empty($_POST["options"])) {
        foreach ($_POST["options"] as $optionPrix) {
            $totalPrix += floatval($optionPrix);
        }
    }

    // Stocker dans la session
    $_SESSION["voyage_actuel"]["prix_total"] = $totalPrix;

    // Mise à jour du fichier JSON
    $content = file_get_contents('users_database.json');
    $users = json_decode($content, true);
    $user_email = $_SESSION["email"];

    foreach ($users as &$user) {
        if ($user["email"] == $user_email) {
            $user["voyage_actuel"]["prix_total"] = $totalPrix;
            break;
        }
    }

    file_put_contents('users_database.json', json_encode($users, JSON_PRETTY_PRINT));

    // Redirection vers la page des détails
    header("Location: details.php?id=" . $_POST["id_voyage"]);
    exit();
}
?>