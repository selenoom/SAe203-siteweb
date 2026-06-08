<?php
require_once '../includes/functions.php';// utilise functions.php
$employes = lireJson('employees.json');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>L'annuaire</title>
</head>
<body>
    <?php afficherHeaderEtNavbar(); ?>

    <h1>La liste du Personnel/employés</h1>

    <ul>
        <?php 
        foreach ($employes as $unEmploye) { 
        ?>
            <li>
                <strong><?php echo $unEmploye['prenom']; ?> <?php echo $unEmploye['nom']; ?></strong> 
                - Poste : <?php echo $unEmploye['fonction']; ?>
            </li>
        <?php 
        } 
        ?> 
    </ul>

</body>
</html>
