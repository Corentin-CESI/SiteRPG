<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les valeurs du formulaire et nettoie les données
    $login = isset($_POST['login']) ? htmlspecialchars($_POST['login']) : "";
    $pwd_unhashed = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : "";

    // Vérifie si une des valeurs est vide
    if(empty($login) || empty($pwd_unhashed)) {
        $error = "Veuillez fournir à la fois le login et le mot de passe.";
    } else {
        // Connexion à la base de données
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
        $sql = "SELECT CPT_LOGIN, CPT_NOM, CPT_PWD FROM t_compte_cpt WHERE CPT_LOGIN = :login";
        $stmt = $pdo_conn->prepare($sql);
        $stmt->bindParam(':login', $login);
        $stmt->execute();

        // Vérifie si le login existe dans la base de données
        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch();

            // Vérifie si le mot de passe est correct
            if (password_verify($pwd_unhashed, $user['CPT_PWD'])) {
                // Authentification réussie : stocke le login dans la session et redirige vers la page d'accueil
                $_SESSION['login'] = $user['CPT_LOGIN'];
                $_SESSION['nom'] = $user['CPT_NOM'];
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
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <?php if(isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <form method="post">
        <div>
            <label for="login">Login:</label>
            <input type="text" id="login" name="login" required>
        </div>
        <div>
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>

