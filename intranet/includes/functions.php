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
