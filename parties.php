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
    <!-- <div class="search-container">
        <h2>Recherche de Parties</h2>
        <form action="#" method="GET">
            <div class="form-group">
                <label for="game-name">Nom du Jeu:</label>
                <input type="text" id="game-name" name="game-name" placeholder="Entrez le nom du jeu">
            </div>
            <div class="form-group">
                <label for="player-count">Nombre de Joueurs:</label>
                <input type="number" id="player-count" name="player-count" placeholder="Entrez le nombre de joueurs">
            </div>
            <button type="submit">Rechercher</button>
        </form>
    </div> -->

    <!-- <div class="search-container">
    <h3>Recherche de Parties</h3>
    <form method="GET" action="recherche_parties.php">
        <div class="form-group">
            <label for="horaire">Horaire (YYYY-MM-DD HH:MM:SS) :</label>
            <input type="datetime-local" id="horaire" name="horaire">
        </div>    
        <div class="form-group">
            <label for="duree">Durée en minutes :</label>
            <input type="number" id="duree" name="duree" min="0">
        </div>
        <button type="submit">Rechercher</button>
    </form>
</div> -->

<?php require_once("recherche_parties.php");?>
<br>
<hr>


    <div class="party-list">
        <h3>Liste des Parties Disponibles</h3>
        <br>

        <?php
             $parties = getparty_static();            

            for ($i=0; $i < count($parties) ; $i++) { 
                $lieu = $parties[$i]["PAT_LIEU"];
                $horaire = $parties[$i]["PAT_HORAIRE"];
                $duree = $parties[$i]["PAT_DUREE"];
                $maitredujeu = $parties[$i]["PAT_MAITREDUJEU"];
                           
                echo '
                <div class="game">        
                        <h4>'.$lieu.'</h4>
                        <p>Horaire : '.$horaire.'</p>
                        <p>Duree en min : '.$duree.'</p>
                        <p>ID maitre de jeu : '.$maitredujeu.'</p>
                        <br>
                </div>';
            // for ($i=0; $i < count($parties) ; $i++) { 
            //     $nom = $parties[$i][0];
            //     $horaire = $parties[$i][1];;
            //     $duree = $parties[$i][2];
            //     echo '
            //     <div>
            //         <h4>'.$nom.'</h4> <p>'.$horaire.' '.$duree.'</p>
            //     </div><br>';
            }
        ?>
    </div>

</body>
</html>
