<?php
require_once '../includes/functions.php';
$listeFichiers = lireJson('files.json');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Documents Partagés</title>
</head>
<body>

    <h1>Espace de Partage de Documents</h1>
    <p>Liste des fichiers .txt et .csv disponibles pour les employés :</p>

    <ul>
        <?php 
        foreach ($listeFichiers as $unFichier) { //boucle pour chaqu'un des fichiers
        ?>
            <li>
                <strong><?php echo $unFichier['nom']; ?></strong> 
                (Format : <?php echo $unFichier['type']; ?>) 
                
                <a href="../data/fichiers_partages/<?php echo $unFichier['nom']; ?>" download>
                    [↓Télécharger]
                </a>
            </li>
        <?php 
        } 
        ?>
    </ul>

    <p><a href="../index.php">Retour à l'accueil</a></p>

</body>
</html>
