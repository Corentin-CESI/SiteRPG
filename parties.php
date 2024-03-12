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
    <div class="search-container">
        <h2>Recherche de Parties</h2>
        <form action="#" method="GET">
            <div class="form-group">
                <label for="game-name">Nom du Jeu:</label>
                <input type="text" id="game-name" name="game-name" placeholder="Entrez le nom du jeu">
            </div>
            <div class="form-group">
                <label for="player-count">Nombre de Joueurs:</label>
                <input type="number" id="player-count" name="player-count" placeholder="Entrez le nombre de joueurs">
            </div>
            <button type="submit">Rechercher</button>
        </form>
    </div>

    <div class="party-list">
        <h3>Liste des Parties Disponibles</h3>
        <ul>
            <li>Nom de la partie 1 - DM: Maître du Jeu - Joueurs: 3/5 - Durée: 2h</li>
            <li>Nom de la partie 2 - DM: Maître du Jeu - Joueurs: 4/6 - Durée: 3h</li>
        </ul>
    </div>

    <div class="create-party">
        <button>Créer une Partie</button>
    </div>
</body>
</html>
