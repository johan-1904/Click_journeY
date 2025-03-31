<!DOCTYPE html>
<?php
require('fonctions.php');
session_start();
bandeau($_SESSION["prenom"]);
?>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de présentation</title>
   <link rel="stylesheet" href="CSS/Présentation.css">
   <link rel="stylesheet" href="CSS/Bandeau.css">
</head>
<body>
    <div class="div">
        <img class="image" src="https://diapogram.com/upload/2022/05/25/20220525120657-309c8961.jpg" alt="Paysage du Maroc"/>
        <div class="texte">
            <h1 class="titre">trek en pays chaud </h1>
            <div class="underline"></div>
            <I class="tt">le retour au source</I>
            
        </div>  
    </div>

    <h1 class="easy">Decouvrez nos plus beau paysages</h1> 

<div class="texte-image1"> 
        <img src="https://eluxtravel.com/media/cache/1188x1188/uploads/img/mediablock_images/65128b547de55_1--Tanzanie.jpg" alt="Paysage"/>  
        <div class="real-text">   
        <B class="text-image">Destination safari aux mille et une couleurs </B>
        <h4 class="text2">Dans les grandes plaines herbeuses où paissent des milliers d’animaux… Sur le miroir de ses lacs où s’ébattent les colonies de graciles flamands roses… Au cœur de la brousse où se cachent les Big 5, la Tanzanie est source d’émerveillement constant. Partez explorer les vastes réserves privées avec Eluxtravel et soyez sûrs que l’inédit vous conduit à un spectacle sans cesse renouvelé. Les réserves sont tellement grandes que vous y serez les rois du monde. Découvrez des spots secrets, observez les plus belles espèces et plongez dans le quotidien des tribus</h4>
    </div>
</div>  

<div class="texte-image1"> 
    <div class="real-text"> 
        <B class="text-image">Vastes réserves privées à foison</B>
        <h4 class="text2">La Tanzanie se révèle sous un angle majestueux avec l’exploration d’espaces naturels intacts comme la réserve de Selous à l’écosystème extraordinaire ou le Parc national de Ruaha. Réserves et lodges spectaculaires rythment votre voyage. Prélassez-vous dans de luxueux campements intégrés au décor grandiose et admirez la savane à perte de vue… Baobabs, acacias et herbes sèches composent la toile de fond d’une nature puissante où les tribus s’accordent en harmonie. Les Hadzabé, les Datoga ou les Masaï seront heureux de vous initier à leur mode de vie. Objectif : transmission et préservation</h4>
    </div>
    <img src="https://eluxtravel.com/media/cache/1188x1188/uploads/img/mediablock_images/65128b547e86c_2--Tanzanie.jpg" alt="Paysage2"/>    
</div>

<div class="texte-image1"> 
    <img src="https://eluxtravel.com/media/cache/1188x1188/uploads/img/mediablock_images/65128b5480e3d_5--Tanzanie.jpg" alt="Paysage3"/>  
    <div class="real-text">   
    <B class="text-image">Rencontre authentique avec les Masaaï </B>
    <h4 class="text2">De part et d’autre de la frontière du Kenya et de la Tanzanie, au pied des monts Kenya et Kilimandjaro, les Maasaï règnent sur un territoire nomade. S’il est bien un peuple qui se bat pour sauvegarder ses traditions et son mode de vie, ce sont les Masaaï. Redoutables chasseurs de lions et éleveurs de bovins, ils ont su tirer avantage de l’essor touristique pour promouvoir leur culture tout en résistant aux sirènes de la mondialisation. Aujourd’hui, c’est en peuple libre et souverain qu’ils vous accueillent pour partager avec vous leur vision de la vie et leur approche respectueuse de la nature.</h4></h4>
    </div>
</div>
<div class="footer1"> 
    <div class="column">
        <h3 class="destination-title">Destinations types :</h3>
        <div class="destination-list">
            <div class="ligne">
            	<a href="#">Afrique du sud</a>
            	<a href="#">Botswana</a>
            </div>
            <div class="ligne">
            	<a href="#">Kenya</a>
            	<a href="#">Mozambique</a>
            </div>
            <div class="ligne">
            	<a href="#">Namibie</a>
            	<a href="#">Republique du Congo</a>
            </div>
            <div class="ligne">
            	<a href="#">Rwanda</a>
            	<a href="#">Sao Tomé et Principe</a>
            </div>
    	</div>
    </div>
    
    <div class="contact">   
    	<h2 class="contact-title">Nous Contacter</h2>
    	<div class="contact-social">
        <a href="https://www.instagram.com/ton_compte_instagram/" class="contact-link"><i class="fa-brands fa-instagram social-icon"></i></a>
        <a href="https://www.instagram.com/ton_compte_instagram/" class="contact-link"><i class="fa-brands fa-x-twitter social-icon"></i></a>
        <a href="https://www.instagram.com/ton_compte_instagram/" class="contact-link"><i class="fa-brands fa-facebook-f social-icon"></i></a>
        </div>
    </div>
</div>
    
<footer>
    <p>© 2025 Trek - Presentation Page</p>
</footer>

</body>
</html>
