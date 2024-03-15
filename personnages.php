<?php 
    require_once("db.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parties</title>
    <link href="css/border_debug.css" rel="stylesheet"/>
    <link href="css/styles_parties.css"  rel="stylesheet">
</head>
<body>
    <?php require "header.html" ?>

    <div class="character-list">
        <h3>Liste de vos personnages</h3>    
        
        <?php
            $personnage = getpersonnage_static();            


            for ($i=0; $i < count($personnage) ; $i++) { 
                $nom = $personnage[$i][0];
                $race = $personnage[$i][1];
                $classe = $personnage[$i][2];
                $niveau = $personnage[$i][3];
                $etat = $personnage[$i][4];
                echo '
                <div>
                    <h4>'.$nom.'</h4> <p>'.$race.' '.$classe.' '.$niveau.' '.$etat.'</p>
                </div><br>';
            }
        ?>

    </div>
    
</body>
</html>