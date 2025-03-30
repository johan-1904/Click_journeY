<?php

session_start();

$content=file_get_contents('users_database.json');
$users = json_decode($content, true);

$flag = false;

foreach($users as $user){
	if($_POST["email"] == $user["email"] && $_POST["password"] == $user["password"]){
		$flag = true;
	}
}
if($flag == true){
	$_SESSION["login"]= $_POST["email"];
	foreach($users as $user){
		if($user["email"] == $_SESSION["login"]){
			$_SESSION["prenom"] = $user["prenom"];
			break;
		}
	}
	
	header('LOCATION: filtre.php');			
}
else{
	header('LOCATION: connexion.php');
}
?>
