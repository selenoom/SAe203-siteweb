<?php
require_once '../includes/functions.php';// utilise functions.php
$employes = lireJson('employees.json');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>L'annuaire</title>
</head>
<body>

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
        ?> //ici boucle pour chaque employé
    </ul>

</body>
</html>
