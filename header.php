<header class="header border_green_dashed">
    <div class="img_container border_red_dashed" >

        <nav class="menu_principal border_red_dashed">     
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="parties.php">Parties</a></li>
                <li><a href="jeux.php">Jeux</a></li>
                <li><a href="personnages.php">Personnages</a></li>
                <li><a href="groupes">Groupes</a></li>

                <?php if(isset($_SESSION['login'])) { ?>   
                    <li>Bienvenue, <?php echo $_SESSION['login']; ?></li>
                    <li><a href="deconnexion.php">Déconnexion</a></li>
                <?php } else { ?>           
                    <li><a href="connexion.php">Se connecter</a></li>
                <?php } ?>
            </ul> 
        </nav>  
    </div>     
</header>