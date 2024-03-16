<?php 
    session_start();
    require_once("db.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeux</title>
    <link href="css/border_debug.css" rel="stylesheet"/>
    <link href="css/styles_jeux.css" rel="stylesheet"/>
</head>
<body>
    <?php require "header.php" ?>
    <div class="game-list">
    <?php 
        $jeux = getjeux_static();

        for ($i=0; $i < count($jeux) ; $i++) { 
            // var_dump($jeux[$i]);
            $titre = $jeux[$i]["UNI_NOM"];
            // $liens = getReglesByJeu($titre);
            $srcImg = $jeux[$i]["UNI_ALIAS"];
            $desc =  $jeux[$i]["UNI_DESCRIPTION"];
            // $lien = (count($liens) > $i) ? $liens[$i] : "jeux.php";
                       
            echo '
            <div class="game">
                 
                    <h2>'.$titre.'</h2>
                    <img src="'.$srcImg.'" alt="Logo Donjons & Dragons" />
                    <p>'.$desc.'</p>
                
                <div>
                    <button class="custom-button">règles</button>
                    <button class="custom-button">scénario</button>
                </div>
            </div>';
        }
        // <a href="'.$lien.'">
        // </a>
    ?>

        <!-- <div class="game">
                <h2>Donjons & Dragons</h2>
                <img src="images/logo/DnD_logo.png" alt="Logo Donjons & Dragons" />
                <p>Un jeu de rôle fantastique classique mettant en scène des aventuriers explorant des donjons et combattant des monstres.</p>
        </div>
        <div class="game">
            <h2>Index Card RPG</h2>
            <img src="images/logo/Index_card_RPG_logo.jpg" alt="Logo Index Card RPG" />
            <p>Un système de jeu de rôle minimaliste utilisant des cartes et favorisant le jeu de rôle narratif.</p>
        </div>
        <div class="game">
            <h2>Fiasco</h2>
            <img src="images/logo/Fiasco_logo.png" alt="Logo Fiasco" />
            <p>Un jeu de rôle narratif centré sur des histoires de tragédie, de comédie et de malentendus.</p>
        </div>
        <div class="game">
            <h2>Blades in the Dark</h2>
            <img src="images/logo/Blades_in_the_dark_logo.png" alt="Logo Blades in the dark" />
            <p>Un jeu de rôle d'action et d'intrigue se déroulant dans un monde de fantasy sombre et urbain.</p>
        </div>
        <div class="game">
            <h2>Alien</h2>
            <img src="images/logo/Alien_logo.png" alt="Logo Alien" />
            <p>Un jeu de rôle basé sur l'univers cinématographique de la série de films Alien, mettant en scène des membres d'équipage confrontés à des horreurs extraterrestres.</p>
        </div>
        <div class="game">
            <h2>Starfinder</h2>
            <img src="images/logo/Starfinder_logo.png" alt="Logo Starfinder" />
            <p>Un jeu de rôle de science-fiction se déroulant dans un univers rempli d'aventures interstellaires, d'exploration et de combats spatiaux.</p>
        </div>
        <div class="game">
            <h2>Cyberpunk</h2>
            <img src="images/logo/Cyberpunk_logo.png" alt="Logo Cyberpunk" />
            <p>Un jeu de rôle de science-fiction dystopique se déroulant dans un futur proche où la technologie et le crime se mêlent.</p>
        </div> -->
    </div>
</body>
</html>