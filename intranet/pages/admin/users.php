<?php
require_once '../../includes/auth.php';
requireConnexion();

if (!in_array('admin', $_SESSION['groupes'])) {
    header('Location: ../../index.php');
    exit;
}

require_once '../../includes/functions.php';
afficherHeaderEtNavbar();

$usersFile = '../../data/users.json';
//$utilisateurs = lireJson('users.json');
$utilisateurs = json_decode(file_get_contents($usersFile), true);

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'] ?? '';
    $password_clair = $_POST['password'] ?? '';
    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $groupe = $_POST['groupe'] ?? 'salaries';

    $password_hache = password_hash($password_clair, PASSWORD_BCRYPT);

    $nouvelUser = [
        "id" => time(),
        "login" => $login,
        "password" => $password_hache, // Stockage du hash sécurisé
        "nom" => $nom,
        "prenom" => $prenom,
        "groupes" => [$groupe, "salaries"]
    ];

    // Enregistrement dans le fichier JSON
    $utilisateurs[] = $nouvelUser;
    file_put_contents($usersFile, json_encode($utilisateurs, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    
    $message = "<div class='alert alert-success'>L'employé a bien été ajouté avec un mot de passe haché !</div>";
}
?>

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Espace Administration - Utilisateurs</h1>
        <a href="../../index.php" class="btn btn-secondary btn-sm">Retour à l'accueil</a>
    </div>
    
    <?php echo $message; ?>

    <div class="row g-4">
        <div class="col-md-5">
            <div class="card p-4 shadow-sm border-0">
                <h5 class="fw-bold mb-3">Ajouter un employé</h5>
                <form method="POST">
                    <div class="mb-2">
                        <label class="form-label small mb-1">Prénom</label>
                        <input type="text" name="prenom" class="form-control form-control-sm" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label small mb-1">Nom</label>
                        <input type="text" name="nom" class="form-control form-control-sm" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label small mb-1">Identifiant (Login)</label>
                        <input type="text" name="login" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small mb-1">Mot de passe (sera haché)</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small mb-1">Groupe utilisateur (Droits d'accès)</label>
                        <select name="groupe" class="form-select form-select-sm">
                            <option value="salaries">Salarié simple</option>
                            <option value="managers">Manager</option>
                            <option value="direction">Direction</option>
                            <option value="admin">Administrateur</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm w-100">Créer le compte</button>
                </form>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card p-4 shadow-sm border-0">
                <h5 class="fw-bold mb-3">Comptes ayant accès à l'intranet</h5>
                <ul class="list-group list-group-flush">
                    <?php foreach ($utilisateurs as $unUtilisateur) { ?>
                        <li class="list-group-item px-0 py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    Identifiant : <strong><?php echo htmlspecialchars($unUtilisateur['login']); ?></strong> <br>
                                    Nom : <span class="text-secondary"><?php echo htmlspecialchars($unUtilisateur['prenom'] . ' ' . $unUtilisateur['nom']); ?></span>
                                </div>
                                <div>
                                    <?php foreach ($unUtilisateur['groupes'] as $g): ?>
                                        <span class="badge bg-light text-dark border small"><?php echo $g; ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>

</body>
</html>
