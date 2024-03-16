<?php
    session_start();
    require_once("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $login = $_POST['login'];
    $password = $_POST['password'];

    // Vérifier les identifiants dans la base de données
    $sql = "SELECT * FROM t_compte_cpt WHERE CPT_LOGIN = :login";
    $stmt = $pdo_conn->prepare($sql);
    $stmt->bindParam(':login', $login);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['CPT_PWD'])) {
        // Authentification réussie
        $_SESSION['login'] = $user['CPT_LOGIN'];
        $_SESSION['nom'] = $user['CPT_NOM'];
        header("location: index.php"); // Rediriger vers la page du profil
    } else {
        // Identifiants incorrects
        $error = "Identifiants incorrects";
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
    <?php if(isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
</body>
</html>