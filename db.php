<?php
        function getjeux_static()
        {
            $jeux = [
                ["Donjons & Dragons", "images/logo/DnD_logo.png", "Un jeu de rôle fantastique classique mettant en scène des aventuriers explorant des donjons et combattant des monstres."],
                ["Index Card RPG", "images/logo/Index_card_RPG_logo.jpg", "Un système de jeu de rôle minimaliste utilisant des cartes et favorisant le jeu de rôle narratif."],
                ["Fiasco", "images/logo/Fiasco_logo.png", "Un jeu de rôle narratif centré sur des histoires de tragédie, de comédie et de malentendus."],
                ["Blades in the Dark", "images/logo/Blades_in_the_dark_logo.png", "Un jeu de rôle d'action et d'intrigue se déroulant dans un monde de fantasy sombre et urbain."],
                ["Alien", "images/logo/Alien_logo.png", "Un jeu de rôle basé sur l'univers cinématographique de la série de films Alien, mettant en scène des membres d'équipage confrontés à des horreurs extraterrestres."],
                ["Starfinder", "images/logo/Starfinder_logo.png", "Un jeu de rôle de science-fiction se déroulant dans un univers rempli d'aventures interstellaires, d'exploration et de combats spatiaux."],
                ["Cyberpunk", "images/logo/Cyberpunk_logo.png", "Un jeu de rôle de science-fiction dystopique se déroulant dans un futur proche où la technologie et le crime se mêlent."],
            ];
            return $jeux;
        }

        function getpersonnage_static()
        {
            $personnage = [
                ["1","Aelorin Moonshadow","Elf","Rôdeur","5","1","1"],
                ["2","Thrain Stoneshield","Nain","Paladin","5","1","2"],
                ["3","Lilith Shadowcaster","Humaine","Sorcier","5","1","3"],
                ["4","Zephyros Stormrider","Génasi de l'Air","Barde","5","1","4"],
                ["5","Kaida Fireheart","Dragonborn","Guerrier","4","0","6"],
            ];
            return $personnage;
        }
?>