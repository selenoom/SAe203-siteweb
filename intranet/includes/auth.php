<?php
session_start();

function requireConnexion() {
    if (!isset($_SESSION['user_id'])) {
        header('Location: /intranet/login.php'); 
        exit;
    }
}

function chargerDonnees($fichier) {
    
    $chemin = __DIR__ . "/../data/" . $fichier; 
    if (file_exists($chemin)) {
        return json_decode(file_get_contents($chemin), true);
    }
    return [];
}

function aLeDroit($groupe) {
    return isset($_SESSION['groupes']) && in_array($groupe, $_SESSION['groupes']);
}
?>
