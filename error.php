<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur</title>
</head>
<body>
    <h1>Erreur</h1>
    <p><?php echo isset($_GET['']) ? htmlspecialchars($_GET['']) : 'Une erreur inattendue s\'est produite.'; ?></p>
</body>
</html>