<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur</title>
</head>
<body>
    <h1>Erreur</h1>
    <p><?php echo isset($_GET['msg']) ? htmlspecialchars($_GET['msg']) : 'Une erreur inattendue s\'est produite.'; ?></p>
</body>
</html>