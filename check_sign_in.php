<?php

session_start();

$content=file_get_contents('users_database.json');
$users = json_decode($content, true);

$flag = false;


foreach($users as $user){
		if($_POST["email"] === $user["email"]){
		$flag = true;
	}
}

if ($flag == true) {
    echo "<script>
        alert('Cette adresse mail est liée à un compte déjà existant');
        window.location.href = 'inscription.php';
    </script>";
    exit;
}

	$users[] = [
		"nom" => $_POST["nom"],
		"prenom" => $_POST["prenom"],
		"email" => $_POST["email"],
		"password" => $_POST["password"],
		"adresse" => "",
		"numero" => "",
		"admin" => "non",
		"banni" => "non"
	];
	file_put_contents('users_database.json', json_encode($users, JSON_PRETTY_PRINT));
	header('LOCATION: connexion.php');
	exit;
?>
