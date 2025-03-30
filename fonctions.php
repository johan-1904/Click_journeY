<?php

function est_admin($admin){
	if($admin === 'oui'){
		return TRUE;
	}
	else{
		return FALSE;
	}
}

function admin($admin){
	if(est_admin($admin)){
		?>
		<a href="admin.php" class="menu-link"><i class="fa-solid fa-user-tie menu-icon"></i>Gérer les utilisateurs</a>
		<?php
	}
}

function affiche_utilisateur(){
	$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
	if ($page < 1) {
    		$page = 1;
	}
	
	$utilisateurs_par_page = 6;
	
	$content=file_get_contents('users_database.json');
	$users = json_decode($content, true);
	
	$total_utilisateurs = count($users);
	$total_pages = ceil($total_utilisateurs / $utilisateurs_par_page);
	$index_depart = ($page - 1) * $utilisateurs_par_page;
	$users_pagination = array_slice($users, $index_depart, $utilisateurs_par_page);
	$count = $index_depart + 1;
	foreach($users_pagination as $user){
		?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $user["nom"] . " " . $user["prenom"]; ?></td>               
                    <?php 
                    if(est_admin($user["admin"])){
                	?>
                    	<td>Administrateur</td>
                    	<?php
                    	}
                	else{
                	?>
                	<td>Utilisateur</td>
                	<?php
                	}
                	?>
                    <td>✅ Connecté</td>
                    <td>
                        <button class="ban">Bannir</button>
                    </td>
                </tr>
                <?php
                $count += 1;
        }
         ?>
                
		<div class="pagination">
   		<?php if ($page > 1): ?>
       		<a href="?page=<?php echo $page - 1; ?>">◀ Précédent</a>
    		<?php endif; ?>
    
    		<?php for ($i = 1; $i <= $total_pages; $i++): ?>
        	<a href="?page=<?php echo $i; ?>" class="<?php echo ($i === $page) ? 'active' : ''; ?>">
           	<?php echo $i; ?>
       		</a>
    		<?php endfor; ?>

    		<?php if ($page < $total_pages): ?>
       		<a href="?page=<?php echo $page + 1; ?>">Suivant ▶</a>
    		<?php endif; ?>
	</div>
	<?php
}

function est_connecte($utilisateur){

	if(empty($utilisateur)){
		return TRUE;
	}
	else{
		return FALSE;
	}
}

function anonyme($utilisateur){
	if(est_connecte($utilisateur)){
		header('LOCATION: Présentation.php');
	}
}

function bandeau($utilisateur){
	
	if(est_connecte($utilisateur)){
	
	?>
		<span id="login">     	
      		<a class="texteAccueil" href="inscription.html"><i class="fa-solid fa-house"></i> Accueil</a>
        
        	<a class="texteVoyage" href="inscription.html"><i class="fa-brands fa-avianex"></i> Nos voyages </a>
        	<a class="texte-recherche" href="inscription.html"><i class="fa-solid fa-camera"></i>  Recherche</a>
      		<a class="home-icon" href="Profil.php"><i class="fa-solid fa-house menu-icon"></i></a>
			<a class="texte-connexion" href="connexion.php"><i class="fa-solid fa-right-to-bracket menu-icon"></i>Se connecter</a>
        	<a class="texte-inscription" href="inscription.php"><i class="fa-solid fa-user-plus menu-icon"></i>Sinscrire</a>
        </span>
        <img class="logo" src="logo.png" alt="logo" />
        <?php
    }
	else{
	?>	
		<span id="login">
      		<div
      		<a class="texteAccueil" href="inscription.html"><i class="fa-solid fa-house"></i> Accueil</a>
        
        	<a class="texteVoyage" href="inscription.html"><i class="fa-brands fa-avianex"></i> Nos voyages </a>
        	<a class="texte-recherche" href="inscription.html"><i class="fa-solid fa-camera"></i>  Recherche</a>
      		<a class="home-icon" href="Profil.php"><i class="fa-solid fa-house menu-icon"></i></a>
			<?php
			echo $utilisateur;
			?>
		<img class="logo" src="logo.png" alt="logo" />
        	</span>
	<?php
	}
}
?>
