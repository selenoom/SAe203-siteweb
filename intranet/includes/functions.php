<?php

function lireJson($nomDuFichier) {

    $chemin = __DIR__ . "/../data/" . $nomDuFichier;
    
    if (!file_exists($chemin)) {
        return []; //liste vide éviter de planter
    }
    $texte = file_get_contents($chemin);
    $tableauTraduit = json_decode($texte, true);
    return $tableauTraduit;
}
function sauvegarderJson($nomDuFichier, $tableauDonnees) {
    $chemin = __DIR__ . "/../data/" . $nomDuFichier;
    
    // transforme notre tableau PHP en texte propre
    $texteJson = json_encode($tableauDonnees, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE); //tbs en txt
    file_put_contents($chemin, $texteJson);
}

function afficherHeaderEtNavbar() {
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <title>Intranet</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-light">

        <nav class="navbar navbar-dark bg-primary shadow-sm mb-4">
            <div class="container-fluid">
                <span class="navbar-brand fw-bold">Intranet </span>
                <div>
                    <a href="pages/annuaire.php" class="btn btn-sm btn-outline-light me-2">Annuaire</a>
                    <a href="pages/fichiers.php" class="btn btn-sm btn-outline-light me-2">Documents</a>
                    <a href="logout.php" class="btn btn-sm btn-danger">Déconnexion</a>
                </div>
            </div>
        </nav>
    <?php
}
