<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les valeurs du formulaire et nettoie les données
    $login = isset($_POST['login']) ? htmlspecialchars($_POST['login']) : "";
    $pwd_unhashed = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : "";

    // Vérifie si une des valeurs est vide
    if(empty($login) || empty($pwd_unhashed)) {
        $error = "Veuillez fournir à la fois le login et le mot de passe.";
    } else {
        // Connexion à la base de données (remplacé par votre propre code de connexion)
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $dbname = 'bdd-rpg';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        try {
            $pdo_conn = new PDO($dsn, $user, $password, $options);
        } catch (PDOException $e) {
            $error = "Erreur de connexion à la base de données: " . $e->getMessage();
        }

        // Requête SQL pour récupérer le mot de passe correspondant au login
        $sql = "SELECT CPT_NOM, CPT_PWD, CPT_ADMIN FROM t_compte_cpt WHERE CPT_NOM = :login";
        $stmt = $pdo_conn->prepare($sql);
        $stmt->bindParam(':login', $login);
        $stmt->execute();

        // Vérifie si le login existe dans la base de données
        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch();
            
            // Vérifie si le mot de passe est correct
            if ($pwd_unhashed == $user['CPT_PWD']) {
                // Authentification réussie : stocke le login dans la session
                $_SESSION['login'] = $user['CPT_NOM'];

                // Vérifie si l'utilisateur est un administrateur
                if ($user['CPT_ADMIN'] == 1) {
                    $_SESSION['CPT_ADMIN'] = 1;
                }

                // Redirige vers la page d'accueil
                header("Location: index.php");
                exit();
            } else {
                $error = "Mot de passe incorrect.";
            }
        } else {
            $error = "Le login n'existe pas ou est en double.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Connexion</title>
    <link href="css/border_debug.css" rel="stylesheet"/>
    <link href="css/styles_connexion.css" rel="stylesheet"/>
</head>
<body>
    <div class="login-container">
        <h2>Connexion</h2>
        <?php if(isset($error)) { ?>
            <p><?php echo $error; ?></p>
        <?php } ?>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="login">Nom d'utilisateur:</label>
                <input type="text" id="login" name="login" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Se connecter</button>
        </form>
        <p>Pas encore de compte ? <a href="inscription.php">Inscrivez-vous ici</a></p>
        <button class="custom-button" onclick="window.location.href='index.php'">Retour à l'accueil</button>

    </div>
</body>
</html>