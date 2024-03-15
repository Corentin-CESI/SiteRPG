<?php
require_once "db.php";
global $pdo_conn;

// Vérifiez si les critères de recherche sont présents dans le formulaire soumis
$horaire = isset($_GET['horaire']) ? $_GET['horaire'] : null;
$duree = isset($_GET['duree']) ? $_GET['duree'] : null;

if (!empty($horaire) || !empty($duree)) {
    try {
        // Construisez dynamiquement votre requête SQL
        $sql = "SELECT * FROM t_partie_pat WHERE 1=1";

        // Ajoutez les conditions en fonction des critères fournis
        if (!empty($horaire)) {
            $sql .= " AND PAT_HORAIRE = :horaire";
        }
        if (!empty($duree)) {
            $sql .= " AND PAT_DUREE = :duree";
        }

        // Préparez et exécutez la requête SQL
        $stmt = $pdo_conn->prepare($sql);
        if (!empty($horaire)) {
            $stmt->bindParam(':horaire', $horaire);
        }
        if (!empty($duree)) {
            $stmt->bindParam(':duree', $duree);
        }
        $stmt->execute();

        // Récupérez les résultats de la requête et affichez-les
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
        // Gérez les erreurs de connexion
        echo "Erreur de connexion: " . $e->getMessage();
    }
} else {
    // Afficher le formulaire de recherche
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
}
?>