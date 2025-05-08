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
	
	$utilisateurs_par_page = 10;
	
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
			<button class="ban-button" onclick="simulateBan(this)" data-etat="debanni">Bannir</button>
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
		header('LOCATION: connexion.php');
	}
}



function bandeau($utilisateur){
	
	if(est_connecte($utilisateur)){
	
	?>
		<span id="login">  
                <div class="flex-navabr">   	
      		<a class="texteAccueil" href="Présentation.php"><i class="fa-solid fa-house"></i> Accueil</a>
        
        	<a class="texteVoyage" href="voyages.php"><i class="fa-brands fa-avianex"></i> Nos voyages </a>
        	<a class="texte-recherche" href="filtre.php"><i class="fa-solid fa-camera"></i>  Recherche</a>
		</div>
      		<a class="user-icon" href="Profil.php"><i class="fa-solid fa-user menu-icon"></i></a>
			<a class="texte-connexion" href="connexion.php"><i class="fa-solid fa-right-to-bracket menu-icon"></i>Se connecter</a>
        	<a class="texte-inscription" href="inscription.php"><i class="fa-solid fa-user-plus menu-icon"></i>Sinscrire</a>
        
	</span>
        <img class="logo" src="logo.png" alt="logo" />
        <?php
    }
	else{
	?> 	
		<span id="login">
      		<div class="flex-navabr">
      		<a class="texteAccueil" href="Présentation.php"><i class="fa-solid fa-house"></i> Accueil</a>
        
        	<a class="texteVoyage" href="voyages.php"><i class="fa-brands fa-avianex"></i> Nos voyages </a>
        	<a class="texte-recherche" href="filtre.php"><i class="fa-solid fa-camera"></i>  Recherche</a>
		</div>      		
                <a class="user-icon" href="Profil.php"><i class="fa-solid fa-user menu-icon"></i></a>
			<?php
			echo $utilisateur;
			?>
		<img class="logo" src="logo.png" alt="logo" />
        	</span>
	<?php
	}
}



function afficher_paramètres($nom, $prenom, $email, $numero, $adresse){
?>			<script src="java/Fonctions.js" type="text/javascript"></script>
			<form id="modif_info" class="account" method="POST" action="Modif_informations.php">
				<div class="account-header">
					<h1 class="account-title">Paramètres du compte</h1>
						<div class="btn-container">
						<button id="annuler_button"type="button" class="cancel-button">Annuler</button>
						<button class="save-button">Enregistrer</button>
						</div>
				</div>
		
				<div class="account-edit">
					<div class="input-container">
						<label>Prénom</label>
						<input name="prenom" type="text" placeholder= "<?php echo $prenom; ?>">
					</div>
					<div class="input-container">
						<label>Nom</label>
						<input name="nom" type="text" placeholder="<?php echo $nom; ?>">
					</div>
				</div>
		
				<div class="account-edit">
					<div class="input-container">
						<label>Email</label>
						<input name="email" type="email" placeholder="<?php echo $email; ?>">
					</div>
					<div class="input-container">
						<label>Numéro de téléphone</label>
						<input name="numero" type="text" placeholder="<?php echo $numero; ?>">
					</div>
				</div>
		
				<div class="account-edit">
					<div class="input-container">
						<label>Adresse</label>
						<textarea name="adresse" placeholder="<?php echo $adresse; ?>"></textarea>
					</div>
				</div>	
			</form>
			<button id="modif_button" class="modif-button">Modifier</button>
			<script>
			Bouton();	
			</script>

<?php

}




function afficher_etape($id_voyage) {

    $content = file_get_contents('voyages.json');
    $voyages = json_decode($content, true);
    $etapes = null;
   

    foreach ($voyages as $voyage) {
        if ($voyage["id"] == $id_voyage) {
            $etapes = $voyage["etapes"];
            break;
        }
    }
    $prix = htmlspecialchars($voyage["tarif"]);

    if ($etapes === null) {
        echo "<p>Aucune étape trouvée.</p>";
        return;
    }
    ?>
    <script src="java/prix.js" type="text/javascript"> </script>
    <input type="hidden" id="tarifBase" value="<?= floatval($prix) ?>">
    
    <form method="POST" action="ajouter_panier.php">
    <input type="hidden" name="destination" value="<?= htmlspecialchars($voyage['nom']) ?>">
    <input type="hidden" name="date_depart" value="<?= htmlspecialchars($voyage['date']) ?>">
    <input type="hidden" name="prix_total" id="prix_total_input">
    <input type="hidden" name="email" value="<?= htmlspecialchars($_SESSION['email']) ?>">


    <label for="nb_personnes">Nombre de personnes :</label>
    <input type="number" id="nb_personnes" name="nb_personnes" value="1" min="1" onchange ="mettreAJourPrix()">
    <p>Prix total des options : <strong id="prixOptions">0.00 €</strong></p>
    

    <h2 class="titre_etape">Étapes</h2>    
    <?php
    foreach ($etapes as $etape) {
        ?>
        <div class="etape">
            <h3><?php echo htmlspecialchars($etape["nom"]); ?></h3>
            <p class="description"><?php echo htmlspecialchars($etape["description"]); ?></p>  
            
            <?php if (!empty($etape["options"])) { ?>
                <h4>Options :</h4>
                <ul>
                    <?php foreach ($etape["options"] as $option) { ?>
                        <li>
                            <label>
                                <?php echo htmlspecialchars($option["nom"]); ?> 
                                <?php echo htmlspecialchars($option["description"]); ?> 
                                (Prix / pers : <?php echo $option["tarif"]; ?>€)
				<input type="checkbox" name="options[]" value="<?= htmlspecialchars($option['tarif'])?>" onchange ="mettreAJourPrix()">
                            </label>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </div>        
        <hr>
        <?php
    }
    ?>
    <input type="submit" name="Valider" value="Ajouter au panier">
    </form>
<?php
}


function genererTransaction($min = 10, $max = 24) {
    $longueur = rand($min, $max);
    return substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, $longueur);
}
