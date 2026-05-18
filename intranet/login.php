<?php
require_once 'includes/auth.php'; // faut revoir les chemins par rapport à l'arborescence car à skip ya des modifs

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $users = chargerDonnees('users.json');
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    foreach ($users as $u) {
        if ($u['login'] === $login && password_verify($password, $u['password'])) {
            $_SESSION['user_id'] = $u['id'];
            $_SESSION['user_login'] = $u['login'];
            $_SESSION['user_nom'] = $u['prenom'] . ' ' . $u['nom'];
            $_SESSION['groupes'] = $u['groupes'];
            header('Location: index.php');
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Connexion</title>
</head>
<body class="bg-light d-flex align-items-center vh-100">
    <div class="container card shadow-sm p-4" style="max-width: 400px;">
        <h2 class="text-center mb-4">Connexion</h2>
        <?php if(isset($erreur)) echo "<div class='alert alert-danger'>$erreur</div>"; ?>
        <form method="POST">
            <div class="mb-3"><label class="form-label">Identifiant</label><input type="text" name="login" class="form-control" required></div>
            <div class="mb-3"><label class="form-label">Mot de passe</label><input type="password" name="password" class="form-control" required></div>
            <button type="submit" class="btn btn-primary w-100">Se connecter</button>
        </form>
    </div>
</body>
</html>
