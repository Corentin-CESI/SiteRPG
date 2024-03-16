<?php 
    session_start();
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
    <?php require "header.php" ?>
    <div class="character-list">
        <h3>Liste de vos personnages</h3>    
        
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
                        <h2>'.$nom.'</h2>
                        <p>'.$race.''.$classe.'<p>'.$niveau.''.$actif.'</p>
                </div>';
            }           
        ?>

    </div>
    
</body>
</html>