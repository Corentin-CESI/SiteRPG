<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parties</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Arimo&display=swap">
    <link href="css/border_debug.css" rel="stylesheet"/>
    <link href="css/styles_parties.css"  rel="stylesheet">
</head>
<body>
    <?php require "header.html" ?>

    <div class="character-list">
        <h3>Liste de vos personnages</h3>    
        
        <?php
            $personnage = getpersonnage_static();

            
        ?>

        <ul>
            <li>personage</li>
            <li>personage</li>
        </ul>

    </div>
    
</body>
</html>