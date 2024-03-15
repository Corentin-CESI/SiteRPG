<?php 
    require_once("db.php");
?>
<!-- <head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Arimo&display=swap">
    <link href="../css/border_debug.css" rel="stylesheet"/>
    <link href="../css/styles_news.css" rel="stylesheet"/>
</head> -->
<section>
    <div class="game-list new-game">
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

<section>
    <div class="section_div table-container border_green_dashed">
        <div class="column_section border_red_dashed">
            <p>Nouveautés</p>
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
    </div>    
</section>

