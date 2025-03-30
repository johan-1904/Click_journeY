<?php



function genererTransaction($min = 10, $max = 24) {
    $longueur = rand($min, $max);
    return substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, $longueur);
}

function est_connecte($utilisateur){

	if(empty($utilisateur)){
		return FALSE;
	}
	else{
		return TRUE;
	}
}


function anonyme($utilisateur){
	if(!est_connecte($utilisateur)){
		header('LOCATION: Présentation.php');
	}
}


function bandeau($utilisateur){	


	if(!est_connecte($utilisateur)){
	
	?>
	<div class="filtre">	
		<span id="login">     	
      			<a class="home-icon" href="Profil.php"><i class="fa-solid fa-house menu-icon"></i></a>
			<a class="texte-connexion" href="connexion.php"><i class="fa-solid fa-right-to-bracket menu-icon"></i>Se connecter</a>
        		<a class="texte-inscription" href="inscription.php"><i class="fa-solid fa-user-plus menu-icon"></i>Sinscrire</a>
        	</span>
        	<img class="logo" src="logo.png" alt="logo"/>
	</div>
    <?php
    }


	else{
    ?>

    		<div class="filtre">	
			<span id="login">
      				<a class="home-icon" href="Profil.php"><i class="fa-solid fa-house menu-icon"></i></a>
				<?php
					echo $utilisateur;
				?>
        		</span>
			<img class="logo" src="logo.png" alt="logo"/>
   		</div>
		<?php
	}
}

?>
