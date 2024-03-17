<?php
// Inclure le fichier de connexion à la base de données
require_once("../db.php");

// Initialiser les variables pour stocker les données du formulaire
$id = $login = $password = "";
$action = "";

// Vérifier si une action est spécifiée dans l'URL
if(isset($_GET['action'])) {
    $action = $_GET['action'];
}

// Fonction pour afficher les utilisateurs
function displayUsers() {
    global $pdo_conn;
    $sql = "SELECT * FROM t_compte_cpt";
    $stmt = $pdo_conn->query($sql);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

// Fonction pour créer un utilisateur
function createUser($login, $password) {
    global $pdo_conn;
    $sql = "INSERT INTO t_compte_cpt (CPT_NOM, CPT_PWD) VALUES (:login, :password)";
    $stmt = $pdo_conn->prepare($sql);
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
}

// Fonction pour modifier un utilisateur
function updateUser($id, $login, $password) {
    global $pdo_conn;
    $sql = "UPDATE t_compte_cpt SET CPT_NOM = :login, CPT_PWD = :password WHERE CPT_ID = :id";
    $stmt = $pdo_conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
}

// Fonction pour supprimer un utilisateur et les enregistrements associés dans la table enfant
function deleteUser($id) {
    global $pdo_conn;
    try {
        // Commencer une transaction
        $pdo_conn->beginTransaction();

        // Supprimer les enregistrements associés dans la table enfant (t_profil_prf)
        $delete_profil_sql = "DELETE FROM t_profil_prf WHERE CPT_ID = :id";
        $delete_profil_stmt = $pdo_conn->prepare($delete_profil_sql);
        $delete_profil_stmt->bindParam(':id', $id);
        $delete_profil_stmt->execute();

        // Ensuite, supprimer l'utilisateur de la table parent (t_compte_cpt)
        $delete_user_sql = "DELETE FROM t_compte_cpt WHERE CPT_ID = :id";
        $delete_user_stmt = $pdo_conn->prepare($delete_user_sql);
        $delete_user_stmt->bindParam(':id', $id);
        $delete_user_stmt->execute();

        // Valider la transaction
        $pdo_conn->commit();

        // Rediriger vers la page de gestion des utilisateurs après la suppression
        header("Location: users_management.php");
        exit();
    } catch(PDOException $e) {
        // Annuler la transaction en cas d'erreur
        $pdo_conn->rollback();
        // Gérer les erreurs de suppression
        echo "Erreur lors de la suppression de l'utilisateur: " . $e->getMessage();
    }
}

// Vérifier si une action d'édition est effectuée
if ($action == "edit") {
    // Récupérer l'ID de l'utilisateur à modifier
    $id = $_GET['id'];

    // Récupérer les données de l'utilisateur à partir de la base de données
    $sql = "SELECT * FROM t_compte_cpt WHERE CPT_ID = :id";
    $stmt = $pdo_conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Pré-remplir les valeurs dans le formulaire
    $id = $user['CPT_ID'];
    $login = $user['CPT_NOM'];
}

// Vérifier si le formulaire de création/modification est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($action == "create") {
        // Récupérer les données du formulaire
        $login = $_POST['login'];
        $password = $_POST['password'];

        // Créer l'utilisateur
        createUser($login, $password);
    } elseif ($action == "update") {
        // Récupérer les données du formulaire
        $id = $_POST['id'];
        $login = $_POST['login'];
        $password = $_POST['password'];

        // Mettre à jour l'utilisateur
        updateUser($id, $login, $password);
    }
}

// Vérifier si une action de suppression est effectuée
if ($action == "delete") {
    // Récupérer l'ID de l'utilisateur à supprimer
    $id = $_GET['id'];

    // Supprimer l'utilisateur
    deleteUser($id);
}

// Récupérer la liste des utilisateurs
$users = displayUsers();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Utilisateurs</title>
    <link rel="stylesheet" href="styles_admin.css">
</head>
<body>
    <div class="admin-container">
        <h2>Gestion des Utilisateurs</h2>
        
        <!-- Formulaire de création d'utilisateur -->
        <form action="?action=create" method="POST">
            <h3>Créer un Utilisateur</h3>
            <input type="text" name="login" placeholder="Nom d'utilisateur" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit">Créer</button>
        </form>

        <!-- Formulaire de modification d'utilisateur -->
        <form action="?action=update" method="POST">
            <h3>Modifier un Utilisateur</h3>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-row">
                <label for="new-username">Nom d'utilisateur:</label>
                <input type="text" id="new-username" name="login" placeholder="Nouveau nom d'utilisateur" value="<?php echo $login; ?>" required>
            </div>
            <div class="form-row">
                <label for="new-password">Mot de passe:</label>
                <input type="password" id="new-password" name="password" placeholder="Nouveau mot de passe">
            </div>
            <button type="submit">Modifier</button>
        </form>


        <!-- Liste des utilisateurs -->
        <h3>Liste des Utilisateurs</h3>
        <ul>
            <?php foreach ($users as $user): ?>
                <li>
                    <?php echo $user['CPT_NOM']; ?>
                    <a href="?action=edit&id=<?php echo $user['CPT_ID']; ?>">Modifier</a>
                    <a href="?action=delete&id=<?php echo $user['CPT_ID']; ?>">Supprimer</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>