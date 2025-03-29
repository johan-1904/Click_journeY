<?php

function est_connecte($utilisateur){

	if($utilisateur !== ''){
		return TRUE;
	}
	else{
		return FALSE;
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
