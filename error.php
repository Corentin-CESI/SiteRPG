<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Erreur</title>
</head>
<body>
    <?php include "header.html"; ?>
    <p>Une erreur est survenue. Veuillez retourner à la page d'accueil et recommencer.</p>
    <?php 
        if(isset($_GET['msg']))
        {
            echo "<p>Détail de l'erreur</p>";
            echo "<p>";
            echo $_GET['msg'];
            echo "</p>";
        }
    ?>
    <?php include 'footer.html'; ?>
</body>
</html>