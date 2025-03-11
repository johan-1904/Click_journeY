<!DOCTYPE html>
<html>
<head>
    <title>TrekDream</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/filtre.css">
</head>

<body>
<div class="filtre">	
    <span id="login">
      	
      	<a class="home-icon" href="Profil.php"><i class="fa-solid fa-house menu-icon"></i></a>
      	<a class="texte-connexion" href="connexion.php"><i class="fa-solid fa-right-to-bracket menu-icon"></i>Se connecter</a>
        <a class="texte-inscription" href="inscription.php"><i class="fa-solid fa-user-plus menu-icon"></i>S'inscrire</a>
    </span>
    <img class="logo" src="logo.png" alt="logo"/>
      
    <div class="contenu">

        <h2>Rechercher un trek</h2>
        <label for="filtre-region">Région :</label>
        <input type="text" id="filtre-region" placeholder="Ex: Désert, Montagne...">
        
        <label for="filtre-date">Date :</label>
        <input type="date" id="filtre-date">
        
        <label for="filtre-difficulte">Difficulté :</label>
        <select id="filtre-difficulte">
            <option value="général">Toutes</option>
            <option value="facile">Facile</option>
            <option value="moyenne">Moyenne</option>
            <option value="difficile">Difficile</option>
        </select>
        
        <label for="filtre-tarif">Budget :</label>
        <input type="number" id="filtre-tarif" placeholder="Ex: 500€">
        
        <button>Rechercher</button>
        
        <h3>Résultats :</h3>
        <div id="liste-treks">
            <div class="Resultat">
                <strong>Désert du Sahara</strong> - Maroc - 10 Mars 2025 - Difficulté: Moyenne - Tarif: 600€
            </div>
            <div class="Resultat">
                <strong>EXEMPLE 2</strong> - pays2 - 15 Avril 2025 - Difficulté: Facile - Tarif: 400€
            </div>
            <div class="Resultat">
                <strong>EXEMPLE 3</strong> - pays3 - 20 Mai 2025 - Difficulté: Difficile - Tarif: 800€
            </div>
        </div>
    </div>
</div>
<footer>
        <p>© 2025 DreamTrek - Searching Page</p>
</footer>
</body>
</html>
