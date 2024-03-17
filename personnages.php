<?php 
    session_start();
    if(!isset($_SESSION['login'])) {
        // Rediriger vers la page de connexion ou afficher un message d'erreur
        header("Location: connexion.php");
        exit();
    }

    require_once("db.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parties</title>
    <link href="css/styles.css" rel="stylesheet"/>
    <link href="css/styles_menu.css" rel="stylesheet"/>
    <link href="css/border_debug.css" rel="stylesheet"/>
    <link href="css/styles_parties.css"  rel="stylesheet">
</head>
<body>
    <?php require "header.php" ?>
    <div class="character-list">
        <h1>Liste de vos personnages</h1> 
        <br>   
        
        <?php
            $personnages = getpersonnage_static(); 

            for ($i=0; $i < count($personnages) ; $i++) { 
                $nom = $personnages[$i]["PRS_NOM"];
                $race = $personnages[$i]["PRS_RACE"];
                $classe = $personnages[$i]["PRS_CLASSE"];
                $niveau = $personnages[$i]["PRS_NIVEAU"];
                $actif = $personnages[$i]["PRS_ACTIF"];
                           
                echo '
                <div class="game">        
                        <h3>'.$nom.'</h3>
                        <p>'.$race.'</p>
                        <p>'.$classe.'</p>
                        <p>'.$niveau.'</p>';

                        // affiche "Actif" ou "Inactif"
                        if ($actif == 1) {
                            echo '<p>Actif</p>';
                        } else if ($actif == 0) {
                            echo '<p>Inactif</p>';
                        } else {
                            echo '<p>Valeur de $actif non reconnue</p>';
                        }
                        
                echo '
                </div>';
            }           
        ?>                   
    </div>
    
</body>
</html>