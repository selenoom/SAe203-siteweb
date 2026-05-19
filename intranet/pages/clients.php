<?php
require_once '../../includes/functions.php';
afficherHeaderEtNavbar();
$clients = lireJson('clients.json');
?>

<div class="container py-2">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Annuaire des Clients</h1>
        <span class="badge bg-secondary fs-6"><?php echo count($clients); ?> clients</span>
    </div>

    <p class="text-muted">Liste des fiches clients de notre entreprise :</p>

    <div class="card shadow-sm border-0 mt-3">
        <table class="table table-striped table-hover align-middle mb-0">
            <thead class="table-primary">
                <tr>
                    <th>Nom de l'Entreprise</th>
                    <th>Contact principal</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                
                foreach ($clients as $unClient) { 
                ?>
                    <tr>
                        <td class="fw-bold text-dark"><?php echo $unClient['entreprise']; ?></td>
                        <td><?php echo $unClient['contact']; ?></td>
                        <td><?php echo $unClient['telephone']; ?></td>
                        <td><a href="mailto:<?php echo $unClient['email']; ?>"><?php echo $unClient['email']; ?></a></td>
                    </tr>
                <?php 
                } 
                ?>
            </tbody>
        </table>
    </div>

    <p class="mt-4"><a href="../../index.php" class="btn btn-secondary btn-sm">Retour à l'accueil</a></p>
</div>

</body>
</html>
