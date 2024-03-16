<?php 
    require_once("db.php");
?>
<section>
<div class="section_div table-container border_green_dashed">
        <div class="column_section border_red_dashed">
            <h2>Nouveautés</h2>
        </div>
        <div class="game-list new-game" id="carousel">
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
</div>