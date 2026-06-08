<?php
require_once '../includes/auth.php';
if (session_status() === PHP_SESSION_NONE) { session_start(); }
require_once '../includes/functions.php';

$filesPath = '../data/files.json';
$listeFichiers = file_exists($filesPath) ? json_decode(file_get_contents($filesPath), true) : [];

$groupesUtilisateur = $_SESSION['groupes'] ?? [];
$estAdmin = in_array('admin', $groupesUtilisateur) || in_array('direction', $groupesUtilisateur);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Documents Partagés</title>
</head>
<body>
    <?php afficherHeaderEtNavbar(); ?>

    <h1>Espace de Partage de Documents</h1>
    <p>Liste des fichiers .txt et .csv disponibles pour les employés :</p>

    <div style="margin: 20px 0; padding: 15px; border: 1px solid #ccc; background: #fff; border-radius: 5px;">
        <strong> Déposer un nouveau document :</strong>
        <form style="margin-top: 10px; display: flex; gap: 10px;">
            <input type="file" accept=".txt,.csv">
            <button type="button" onclick="alert('Fichier téléversé')">Enregistrer</button>
        </form>
    </div>

    <ul>
        <?php 
        foreach ($listeFichiers as $unFichier) { 
        ?>
            <li>
                <strong><?php echo $unFichier['nom']; ?></strong> 
                (Format : <?php echo $unFichier['type']; ?>) 
                
                <button type="button" onclick="alert('Contenu du fichier <?php echo htmlspecialchars($unFichier['nom']); ?> :\n\n[Données SI NovaTech]')">👁️ Visualiser</button>

                <a href="../data/fichiers_partages/<?php echo $unFichier['nom']; ?>" download>[↓ Télécharger]</a>
                
                <?php if ($estAdmin): ?>
                    <button type="button" style="color: red;" onclick="alert('Fichier supprimé !')">❌ Supprimer</button>
                <?php else: ?>
                    <button type="button" style="color: gray;" onclick="alert('Droits admin requis')" disabled>🔒 Supprimer</button>
                <?php endif; ?>
            </li>
        <?php 
        } 
        ?>
    </ul>

    <p><a href="../index.php">Retour à l'accueil</a></p>

</body>
</html>
