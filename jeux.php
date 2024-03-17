<?php 
    require_once("db.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeux</title>
    <link href="css/styles.css" rel="stylesheet"/>
    <link href="css/styles_menu.css" rel="stylesheet"/>
    <link href="css/border_debug.css" rel="stylesheet"/>
    <link href="css/styles_jeux.css" rel="stylesheet"/>
</head>
<body>
    <?php require "header.php" ?>
    <div class="game-list">
    <?php 
        $jeux = getjeux_static();

        for ($i=0; $i < count($jeux) ; $i++) { 

            $titre = $jeux[$i]["UNI_NOM"];

            $srcImg = $jeux[$i]["UNI_ALIAS"];
            $desc =  $jeux[$i]["UNI_DESCRIPTION"];
                       
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
    ?>
    </div>
</body>
</html>