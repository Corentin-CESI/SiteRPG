<!-- <head>
        <link href="css/border_debug.css" rel="stylesheet"/>
        <link href="css/styles.css" rel="stylesheet"/>
    </head> -->
<footer class="footer border_green_dashed">
        <div>  
          <p>© 2024 SiteRPG.fr </p>
          <p>Tous les jeux de rôle mentionnés sont la propriété de leurs détenteurs de droits respectifs.</p>  
        </div>

        <div>  
          <h3>Contact <h3>
          <p>lhercorentin@hotmail.fr</p>
          <p>github.com/Corentin-CESI</p>
          <?php 
          // Vérifier si l'utilisateur est un administrateur
          if(isset($_SESSION['CPT_ADMIN']) && $_SESSION['CPT_ADMIN'] == 1) {
              echo '<button onclick="window.location.href=\'admin/admin.php\'">Admin</button>';
          }
          ?>
      </div>   
  </footer>