<?php

session_start();
echo("HAHAHA");

$content=file_get_contents('users_database.json');
$users = json_decode($content, true);

$flag = false;


foreach($users as $user){
	echo("fzffze");
	if($_POST["email"] === $user["email"]){
		$flag = true;
	}
}
if($flag == true){
	header('LOCATION: inscription.php');
	exit;
}
	$users[] = [
		"nom" => $_POST["nom"],
		"prenom" => $_POST["prenom"],
		"email" => $_POST["email"],
		"password" => $_POST["password"]
	];
	file_put_contents('users_database.json', json_encode($users, JSON_PRETTY_PRINT));
	header('LOCATION: connexion.php');
	exit;
?>
