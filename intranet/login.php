<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'includes/functions.php';


if (isset($_SESSION['user_id'])) { // si utilisateur est déjà connecté, on l'envoie à menu.php
    header('Location: menu.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $users = lireJson('users.json');
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    foreach ($users as $u) {

        if ($u['login'] === $login && password_verify($password, $u['password'])) {
            $_SESSION['user_id'] = $u['id'];
            $_SESSION['user_login'] = $u['login'];
            $_SESSION['user_nom'] = $u['prenom'] . ' ' . $u['nom'];
            $_SESSION['groupes'] = $u['groupes'];
            
            header('Location: menu.php');
            exit;
        }
    }
    $erreur = "Identifiants incorrects.";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion Intranet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-primary mb-4">
        <div class="container-fluid">
            <span class="navbar-brand fw-bold">Intranet Carnation</span>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-sm p-4 border-0">
                    <h2 class="text-center mb-4">Connexion Intranet</h2>
                    
                    <?php if(isset($erreur)) echo "<div class='alert alert-danger'>$erreur</div>"; ?>
                    
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Identifiant</label>
                            <input type="text" name="login" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mot de passe</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Se connecter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
