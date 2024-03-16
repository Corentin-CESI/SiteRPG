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

<?php 
    // Vérifie si les critères de recherche sont présents dans le formulaire soumis
$horaire = isset($_GET['horaire']) ? $_GET['horaire'] : null;
$duree = isset($_GET['duree']) ? $_GET['duree'] : null;

try {
    // Construit la requête SQL
    $sql = "SELECT * FROM t_partie_pat WHERE 1=1";

    // Ajoute les conditions en fonction des critères
    if (!empty($horaire)) {
        $sql .= " AND PAT_HORAIRE = :horaire";
    }
    if (!empty($duree)) {
        $sql .= " AND PAT_DUREE = :duree";
    }

    // Prépare et exécute la requête SQL
    $stmt = $pdo_conn->prepare($sql);
    if (!empty($horaire)) {
        $stmt->bindParam(':horaire', $horaire);
    }
    if (!empty($duree)) {
        $stmt->bindParam(':duree', $duree);
    }
    $stmt->execute();

    // Affiche le formulaire de recherche
    echo "<div class='search-container'>";
    echo "<h3>Recherche de Parties</h3>";
    echo "<form method='GET' action='parties.php'>";
    echo "<div class='form-group'>";
    echo "<label for='horaire'>Horaire :</label>";
    echo "<input type='datetime-local' id='horaire' name='horaire'>";
    echo "</div>";
    echo "<div class='form-group'>";
    echo "<label for='duree'>Durée en minutes :</label>";
    echo "<input type='number' id='duree' name='duree' min='0'>";
    echo "</div>";
    echo "<button type='submit'>Rechercher</button>";
    echo "</form>";
    echo "</div>";

    // Récupére les résultats de la requête et affiche
    echo "<div class='party-list'>";
    echo "<h3>Résultats de la recherche</h3>";
    while ($row = $stmt->fetch()) {
        echo "<div>";
        echo "<h4>" . $row['PAT_LIEU'] . "</h4>";
        echo "<p>Horaire : " . $row['PAT_HORAIRE'] . "</p>";
        echo "<p>Durée en min : " . $row['PAT_DUREE'] . "</p>";
        echo "<p>ID maitre de jeu : " . $row['PAT_MAITREDUJEU'] . "</p>";
        echo "</div>";
    }
    echo "</div>";
} catch (PDOException $e) {
    // Gére les erreurs de connexion
    echo "Erreur de connexion: " . $e->getMessage();
}
?>

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
            }
        ?>
    </div>

</body>
</html>
