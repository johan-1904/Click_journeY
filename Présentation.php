<<!DOCTYPE html>
<?php
require('fonctions.php');
session_start();
bandeau($_SESSION["prenom"]);
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de présentation</title>

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  
<link rel="stylesheet" href="CSS/Bandeau.css">
<link id="css" rel="stylesheet" href="CSS/Présentation.css">

</head>
<body>

  
    <div class="div">
        <img class="image" src="https://diapogram.com/upload/2022/05/25/20220525120657-309c8961.jpg" alt="Paysage du Maroc"/>
        <div class="texte">
            <h1 class="titre">trek en pays chaud</h1>
            <div class="underline"></div>
            <i class="tt">le retour au source</i>
        </div>  
    </div>

    <h1 class="easy">Découvrez nos plus beaux paysages</h1> 

    <div class="texte-image1"> 
        <img src="images/savane2.jpg" alt="Paysage de Tanzanie" />
        <div class="real-text">   
            <b class="text-image">Destination safari aux mille et une couleurs</b>
            <h4 class="text2">Dans les grandes plaines herbeuses où paissent des milliers d’animaux…</h4>
        </div>
    </div>  

    <div class="texte-image1"> 
        <div class="real-text"> 
            <b class="text-image">Vastes réserves privées à foison</b>
            <h4 class="text2">La Tanzanie se révèle sous un angle majestueux...</h4>
        </div>
        <img src="images/lion.jpg" alt="Paysage2"/>    
    </div>

    <div class="texte-image1"> 
        <img src="images/masai.jpg" alt="Paysage3"/>  
        <div class="real-text">   
            <b class="text-image">Rencontre authentique avec les Masaaï</b>
            <h4 class="text2">Au pied des monts Kenya et Kilimandjaro, les Maasaï règnent...</h4>
        </div>
    </div>

    
    <div class="footer1"> 
        <div class="column">
            <h3 class="destination-title">Destinations types :</h3>
            <div class="destination-list">
                <div class="ligne"><a href="#">Afrique du sud</a><a href="#">Botswana</a></div>
                <div class="ligne"><a href="#">Kenya</a><a href="#">Mozambique</a></div>
                <div class="ligne"><a href="#">Namibie</a><a href="#">Republique du Congo</a></div>
                <div class="ligne"><a href="#">Rwanda</a><a href="#">Sao Tomé et Principe</a></div>
            </div>
        </div>

        <div class="contact">   
            <h2 class="contact-title">Nous Contacter</h2>
            <div class="contact-social">
                <a href="#" class="contact-link"><i class="fa-brands fa-instagram social-icon"></i></a>
                <a href="#" class="contact-link"><i class="fa-brands fa-x-twitter social-icon"></i></a>
                <a href="#" class="contact-link"><i class="fa-brands fa-facebook-f social-icon"></i></a>
            </div>
        </div>
    </div>

    <footer>
        <p>© 2025 Trek - Presentation Page</p>
    </footer>

    
    <script src="scipt.js"></script>
</body>
</html>
