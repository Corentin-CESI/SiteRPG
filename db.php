<?php

//------------------------------------
//  _____      _ _    ____________ 
// |_   _|    (_) |   |  _  \ ___ \
//   | | _ __  _| |_  | | | | |_/ /
//   | || '_ \| | __| | | | | ___ \
//  _| || | | | | |_  | |/ /| |_/ /
//  \___/_| |_|_|\__| |___/ \____/ 
//------------------------------------
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'bdd-rpg';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo_conn = new PDO($dsn, $user, $password, $options);
} catch (PDOException $e) {
    $msg = $e->getMessage();
    header("Location: 404.html"); 
    die("Connection failed: " . $e->getMessage() . ' <br> Wtih error n° ' . (int)$e->getCode());
}

        function getjeux_static()
        {
            $jeux = [
                ["Donjons & Dragons", "images/logo/DnD_logo.png", "Un jeu de rôle fantastique classique mettant en scène des aventuriers explorant des donjons et combattant des monstres."],
                ["Index Card RPG", "images/logo/Index_card_RPG_logo.jpg", "Un système de jeu de rôle minimaliste utilisant des cartes et favorisant le jeu de rôle narratif."],
                ["Fiasco", "images/logo/Fiasco_logo.png", "Un jeu de rôle narratif centré sur des histoires de tragédie, de comédie et de malentendus."],
                ["Blades in the Dark", "images/logo/Blades_in_the_dark_logo.png", "Un jeu de rôle d'action et d'intrigue se déroulant dans un monde de fantasy sombre et urbain."],
                ["Alien", "images/logo/Alien_logo.png", "Un jeu de rôle basé sur l'univers cinématographique de la série de films Alien, mettant en scène des membres d'équipage confrontés à des horreurs extraterrestres."],
                ["Starfinder", "images/logo/Starfinder_logo.png", "Un jeu de rôle de science-fiction se déroulant dans un univers rempli d'aventures interstellaires, d'exploration et de combats spatiaux."],
                ["Cyberpunk", "images/logo/Cyberpunk_logo.webp", "Un jeu de rôle de science-fiction dystopique se déroulant dans un futur proche où la technologie et le crime se mêlent."],
            ];
            return $jeux;
        }

        function getReglesByJeux($titre){
            
            return array(
                "rules_and_scenario.php"
                // "donjons_&_dragons.php",
                // "index_card_rpg.php",
                // "fiasco.php",
                // "blades_in_the_dark.php",
                // "alien.php",
                // "starfinder.php",
                // "cyberpunk.php"
            );
        }

        function getpersonnage_static()
        {
            $personnage = [
                ["Aelorin Moonshadow","Elf","Rôdeur","5","Actif"],
                ["Thrain Stoneshield","Nain","Paladin","5","Actif"],
                ["Lilith Shadowcaster","Humaine","Sorcier","5","Actif"],
                ["Zephyros Stormrider","Génasi de l'Air","Barde","5","Actif"],
                ["Kaida Fireheart","Dragonborn","Guerrier","4","Inactif"],
            ];
            return $personnage;
        }

        function getparty_static()
        {
            $parties = [
                ["Les Larmes d'Elérion"," 2023-12-06 14:00:00","300"],
                ["Les Ombres de la Cité Interdite","2023-12-06 17:00:00","270"],
                ["La Folie du Nécromancien","2023-12-08 17:00:00","180"],
                ["L'Ombre du Rift Quantique","2023-12-09 11:00:00","240"],
                ["Le Coup du Siècle","2023-12-10 13:00:00","120"],
            ];
            return $parties;
        }  
?>