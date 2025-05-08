<?php

session_start(); 
$content=file_get_contents('users_database.json');
$users = json_decode($content, true);



foreach($users as &$user){
	if($_SESSION["email"] === $user["email"]){
		if(!empty($_POST["prenom"])){
			$user["prenom"] = $_POST["prenom"];
			$_SESSION["prenom"] = $_POST["prenom"];
		}
		if(!empty($_POST["nom"])){
			$user["nom"] = $_POST["nom"];
			$_SESSION["nom"] = $_POST["nom"];
		}
		if(!empty($_POST["adresse"])){
			$user["adresse"] = $_POST["adresse"];
			$_SESSION["adresse"] = $_POST["adresse"];
		}
		if(!empty($_POST["numero"])){
			$user["numero"] = $_POST["numero"];
			$_SESSION["numero"] = $_POST["numero"];
		}
		if(!empty($_POST["email"])){
			$user["email"] = $_POST["email"];
			$_SESSION["email"] = $_POST["email"];
		}
	}
}
file_put_contents('users_database.json', json_encode($users, JSON_PRETTY_PRINT));
header('LOCATION: Profil.php');
exit;

?>
