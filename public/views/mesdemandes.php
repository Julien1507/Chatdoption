<?php require_once ROOT_PATH . '/public/includes/header.php'; ?>

<div class="container my-4">
    <h2 class="text-center py-2 mb-4" style="background-color: #4a3728; color: #d4a96a; border-radius: 4px;">Mes demandes d'adoption</h2>

    <?php if (empty($demandes)): ?>
        <p class="text-center" style="color: #4a3728;">Vous n'avez pas encore fait de demande d'adoption.</p>
    <?php else: ?>
        <div class="row">
            <?php foreach($demandes as $demande): ?>
            <div class="col-12 col-lg-4 mb-3">
                <div class="border p-3" style="background-color: #3a2a1a; color: #d4a96a; border-radius: 4px;">
                    <img src="<?= BASE_URL ?>/images/<?= $demande['image'] ?>" alt="<?= $demande['nom'] ?>" style="width:100%; height: 180px; object-fit: cover; border-radius: 4px;">
                    <p class="mt-2 mb-1"><strong><?= $demande['nom'] ?></strong></p>
                    <p class="mb-1 small">Date : <?= date('d/m/Y', strtotime($demande['date_demande'])) ?></p>
                    <p class="mb-0 small">Statut : 
                        <?php if ($demande['statut'] == 'en_attente'): ?>
                            <span style="color: #e8722a;">En attente</span>
                        <?php elseif ($demande['statut'] == 'accepte'): ?>
                            <span style="color: #4caf50;">Acceptée</span>
                        <?php else: ?>
                            <span style="color: #f44336;">Refusée</span>
                        <?php endif; ?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php require_once ROOT_PATH . '/public/includes/footer.php';?>