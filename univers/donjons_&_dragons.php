<?php 
    require_once("db.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeux</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Arimo&display=swap">
    <link href="css/border_debug.css" rel="stylesheet"/>
    <link href="css/styles_jeux.css" rel="stylesheet"/>
</head>
<body>
    <?php require "header.html" ?>
    <div class="game-list">
        <div class="game">
            <h2>Livres de Régles</h2>
            <img src="images/logo/DnD_logo.png" alt="Logo Donjons & Dragons" />
            <p>Un jeu de rôle fantastique classique mettant en scène des aventuriers explorant des donjons et combattant des monstres.</p>
        </div>
        <div class="game">
            <h2>Livres de Scènarios</h2>
            <img src="images/logo/Index_card_RPG_logo.jpg" alt="Logo Index Card RPG" />
            <p>Un système de jeu de rôle minimaliste utilisant des cartes et favorisant le jeu de rôle narratif.</p>
    </div>
</body>
</html>