<?php
require_once '../includes/auth.php';
if (session_status() === PHP_SESSION_NONE) { session_start(); }
require_once '../includes/functions.php';

// Correction du chemin vers data/
$partnersPath = '../data/partners.json';
$partenaires = file_exists($partnersPath) ? json_decode(file_get_contents($partnersPath), true) : [];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Nos Partenaires</title>
</head>
<body class="bg-light">

    <?php afficherHeaderEtNavbar(); ?>

    <div class="container py-2">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Les partenaires</h1>
            <span class="badge bg-secondary fs-6"><?php echo count($partenaires); ?> partenaires</span>
        </div>
    
        <p class="text-muted">Retrouvez la liste des entreprises partenaires :</p>
    
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-2">
            <?php 
            foreach ($partenaires as $unPartenaire) { 
            ?>
                <div class="col">
                    <div class="card h-100 shadow-sm border-0 p-3">
                        <div class="card-body">
                            <h5 class="card-title text-primary">
                                <?php echo $unPartenaire['nom']; ?>
                            </h5>
                            
                            <p class="card-text small text-secondary mt-3">
                                <?php echo $unPartenaire['description']; ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php 
            } // Fin de la boucle comme ds annuaire 
            ?>
        </div>
    
        <p class="mt-4"><a href="../index.php" class="btn btn-secondary btn-sm">Retour à l'accueil</a></p>
    </div>

</body>
</html>
