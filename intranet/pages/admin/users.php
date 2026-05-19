<?php
require_once '../../includes/functions.php';
afficherHeaderEtNavbar();
$utilisateurs = lireJson('users.json');
?>

<div class="container py-2">
    <h1>Liste des comptes utilisateurs</h1>
    <p class="text-muted">Voici les personnes qui ont un accès à l'intranet :</p>

    <ul class="list-group shadow-sm mt-3">
        <?php 
        foreach ($utilisateurs as $unUtilisateur) { 
        ?>
            <li class="list-group-item">
                Identifiant : <strong><?php echo $unUtilisateur['login']; ?></strong> <br>
                Nom : <?php echo $unUtilisateur['prenom']; ?> <?php echo $unUtilisateur['nom']; ?>
            </li>
        <?php 
        } // encore une boucle pour chaque users
        ?>
    </ul>

    <p class="mt-4"><a href="../../index.php" class="btn btn-secondary btn-sm">Retour à l'accueil</a></p>
</div>

</body>
</html>
