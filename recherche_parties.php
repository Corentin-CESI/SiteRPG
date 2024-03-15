<?php
global $pdo_conn;

require_once "db.php"; // Assurez-vous d'inclure votre fichier db.php

if (isset($_GET['horaire']) && isset($_GET['duree'])) {
    $horaire = $_GET['horaire'];
    $duree = $_GET['duree'];

    try {
        // Préparez votre requête SQL pour récupérer les parties en fonction de l'horaire et de la durée
        $stmt = $pdo_conn->prepare("SELECT * FROM t_partie_pat WHERE PAT_HORAIRE = :horaire AND PAT_DUREE = :duree");
        // Liez les valeurs des paramètres
        $stmt->bindParam(':horaire', $horaire);
        $stmt->bindParam(':duree', $duree);
        // Exécutez la requête
        $stmt->execute();
        // Récupérez les résultats de la requête
        $parties = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Affichez les résultats
        foreach ($parties as $partie) {
            echo "<div>";
            echo "<h4>" . $partie['PAT_LIEU'] . "</h4>";
            echo "<p>Horaire : " . $partie['PAT_HORAIRE'] . "</p>";
            echo "<p>Durée en min : " . $partie['PAT_DUREE'] . "</p>";
            echo "<p>ID maitre de jeu : " . $partie['PAT_MAITREDUJEU'] . "</p>";
            echo "</div>";
        }
    } catch (PDOException $e) {
        // Gérez les erreurs de connexion
        echo "Erreur de connexion: " . $e->getMessage();
    }
}
?>