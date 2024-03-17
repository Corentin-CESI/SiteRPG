<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les valeurs du formulaire et nettoie les données
    $username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : "";
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : "";
    $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : "";
    $confirm_password = isset($_POST['confirm-password']) ? htmlspecialchars($_POST['confirm-password']) : "";

    // Vérifie si une des valeurs est vide
    if(empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = "Veuillez remplir tous les champs.";
    } elseif ($password !== $confirm_password) {
        $error = "Les mots de passe ne correspondent pas.";
    } else {
        // Connexion à la base de données
        $host = 'localhost';
        $user = 'root';
        $password_db = '';
        $dbname = 'bdd-rpg';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $pdo_conn = new PDO($dsn, $user, $password_db, $options);
        } catch (PDOException $e) {
            $error = "Erreur de connexion à la base de données: " . $e->getMessage();
        }

        // Insère les informations dans la table t_compte_cpt
        $sql_insert_cpt = "INSERT INTO t_compte_cpt (CPT_NOM, CPT_PWD) VALUES (:username, :password)";
        $stmt_insert_cpt = $pdo_conn->prepare($sql_insert_cpt);
        $stmt_insert_cpt->bindParam(':username', $username);
        $stmt_insert_cpt->bindParam(':password', $password);

        if ($stmt_insert_cpt->execute()) {

            $lastId = $pdo_conn->lastInsertId();

            // Insère les informations dans la table t_profil_prf
            $sql_insert_prf = "INSERT INTO t_profil_prf (CPT_ID, PRF_EMAIL) VALUES (:lastId, :email)";
            $stmt_insert_prf = $pdo_conn->prepare($sql_insert_prf);
            $stmt_insert_prf->bindParam(':lastId', $lastId);
            $stmt_insert_prf->bindParam(':email', $email);
            
            if ($stmt_insert_prf->execute()) {
                $success = "Compte créé avec succès.";
            } else {
                $error = "Une erreur s'est produite lors de la création du compte.";
            }
        } else {
            $error = "Une erreur s'est produite lors de la création du compte.";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création de compte</title>
    <link href="css/border_debug.css" rel="stylesheet"/>
    <link href="css/styles_inscription.css" rel="stylesheet"/>
</head>
<body>
    <div class="signup-container">
        <h2>Créer un compte</h2>
        <?php if(isset($error)) { ?>
            <p><?php echo $error; ?></p>
        <?php } elseif(isset($success)) { ?>
            <p><?php echo $success; ?></p>
        <?php } ?>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="username">Nom d'utilisateur:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Adresse email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirmer le mot de passe:</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
            </div>
            <button type="submit">Créer le compte</button>
        </form>
        <p>Déjà un compte ? <a href="connexion.php">Connectez-vous ici</a></p>
        <button class="custom-button" onclick="window.location.href='index.php'">Retour à l'accueil</button>

    </div>
</body>
</html>









<!-- <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création de compte</title>
    <link href="css/border_debug.css" rel="stylesheet"/>
    <link href="css/styles_inscription.css" rel="stylesheet"/>
</head>
<body>
    <div class="signup-container">
        <h2>Créer un compte</h2>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="username">Nom d'utilisateur:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Adresse email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirmer le mot de passe:</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
            </div>
            <button type="submit">Créer le compte</button>
        </form>
        <p>Déjà un compte ? <a href="connexion.php">Connectez-vous ici</a></p>
    </div>
</body>
</html> -->