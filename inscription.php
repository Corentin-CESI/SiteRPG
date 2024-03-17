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

        // Vérifie si l'email existe déjà dans la table t_profil_prf
        $sql_check_email_prf = "SELECT PRF_EMAIL FROM t_profil_prf WHERE PRF_EMAIL = :email";
        $stmt_check_email_prf = $pdo_conn->prepare($sql_check_email_prf);
        $stmt_check_email_prf->bindParam(':email', $email);
        $stmt_check_email_prf->execute();

        // Vérifie si l'email existe déjà dans la table t_compte_cpt
        $sql_check_email_cpt = "SELECT CPT_LOGIN FROM t_compte_cpt WHERE CPT_LOGIN = :email";
        $stmt_check_email_cpt = $pdo_conn->prepare($sql_check_email_cpt);
        $stmt_check_email_cpt->bindParam(':email', $email);
        $stmt_check_email_cpt->execute();

        if ($stmt_check_email_prf->rowCount() > 0 || $stmt_check_email_cpt->rowCount() > 0) {
            $error = "L'adresse email est déjà utilisée.";
        } else {
            // Insère les informations dans la table t_profil_prf
            $sql_insert_prf = "INSERT INTO t_profil_prf (PRF_EMAIL) VALUES (:email)";
            $stmt_insert_prf = $pdo_conn->prepare($sql_insert_prf);
            $stmt_insert_prf->bindParam(':email', $email);
            if ($stmt_insert_prf->execute()) {
                // Insère les informations dans la table t_compte_cpt (en excluant CPT_ID)
                $sql_insert_cpt = "INSERT INTO t_compte_cpt (CPT_NOM, CPT_PWD) VALUES (:username, :password)";
                $stmt_insert_cpt = $pdo_conn->prepare($sql_insert_cpt);
                $stmt_insert_cpt->bindParam(':username', $username);
                $stmt_insert_cpt->bindParam(':password', $password);
                if ($stmt_insert_cpt->execute()) {
                    $success = "Compte créé avec succès.";
                } else {
                    $error = "Une erreur s'est produite lors de la création du compte.";
                }
            } else {
                $error = "Une erreur s'est produite lors de la création du compte.";
            }
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