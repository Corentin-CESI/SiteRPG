<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Site RPG</title>
    <link href="css/border_debug.css" rel="stylesheet"/>
    <link href="css/styles.css" rel="stylesheet"/>
</head>
<body>
    <?php require "header.html" ?>

    <?php 
    
    try {
        require "sections/all_sections.php" ;
    } catch (\Throwable $th) {
        require "404.html";
    }
    
    
    
    ?>


    <section>
        <div class="section_div border_green_dashed">
            <div class="column_section border_red_dashed">
                <div class="border_blueviolet_solid">
                    <h2>Pleins de jeux à découvrires </h2>
                </div>
                <div class="img_game_logo">
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="section_div border_green_dashed">
            <div class="column_section border_red_dashed">
                <div class="column_section border_blueviolet_solid">
                    <h1>De nombreaux outils à votre dispositions !<h1>
                    <p>Ce site possède un ensemble d’outils visent à simplifier la gestion des parties  des rôlistes, à faciliter la recherche de compagnons de jeu et à offrir une expérience communautaire enrichissante.<p>
                </div>

                <div class="column_section border_blueviolet_solid">
                    <table>
                        <tr>
                            <td><img src="images/image1.jpg" alt="Image 1"></td>
                            <td>Description de l'image 1</td>
                        </tr>
                        <tr>
                            <td><img src="images/image2.jpg" alt="Image 2"></td>
                            <td>Description de l'image 2</td>
                        </tr>
                        <tr>
                            <td><img src="images/image3.jpg" alt="Image 3"></td>
                            <td>Description de l'image 3</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>

    
    <?php include_once "footer.html" ?>
    
</body>


</html>