<?php
require_once 'includes/auth.php'; //vérifier les chemins 
requireConnexion();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Accueil Intranet</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-primary mb-4">
        <div class="container-fluid">
            <span class="navbar-brand">Intranet</span>
            <span class="navbar-text text-white">Bonjour<?php echo $_SESSION['user_nom']; ?> | <a href="logout.php" class="text-white">Déconnexion</a></span>
        </div>
    </nav>
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4"><div class="card p-3 shadow-sm text-center"><h5>Annuaire</h5><a href="pages/annuaire.php" class="btn btn-outline-primary">Ouvrir</a></div></div>
            <div class="col-md-4"><div class="card p-3 shadow-sm text-center"><h5>Clients</h5><a href="pages/clients.php" class="btn btn-outline-primary">Ouvrir</a></div></div>
            <div class="col-md-4"><div class="card p-3 shadow-sm text-center"><h5>Fichiers</h5><a href="pages/fichiers.php" class="btn btn-outline-primary">Ouvrir</a></div></div>
            <?php if(aLeDroit('admin')): ?>
            <div class="col-12"><div class="card p-3 shadow-sm bg-light"><h5>Administration</h5><a href="pages/admin/users.php" class="btn btn-danger w-25">Gérer Utilisateurs</a></div></div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
