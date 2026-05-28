<?php 
require_once ROOT_PATH . '/public/includes/header.php'; ?>

<div class="container my-4">
    <h2 class="text-center py-2 mb-4" style="background-color: #4a3728; color: #d4a96a; border-radius: 4px;">Mes favoris</h2>

    <?php if (empty($favoris)): ?>
        <p class="text-center" style="color: #4a3728;">Vous n'avez pas encore de favoris.</p>
    <?php else: ?>
        <div class="row">
            <?php foreach($favoris as $chat): ?>
            <div class="col-12 col-lg-4 mb-3">
                <div class="border p-3" style="background-color: #3a2a1a; color: #d4a96a; border-radius: 4px;">
                    <img src="<?= BASE_URL ?>/images/<?= htmlspecialchars($chat['image']) ?>" alt="<?= htmlspecialchars($chat['nom']) ?>" style="width:100%; height: 180px; object-fit: cover; border-radius: 4px;">
                    <p class="mt-2 mb-1"><strong><?= htmlspecialchars($chat['nom']) ?></strong></p>
                    <p class="mb-0 small">Age : <?= htmlspecialchars($chat['age']) ?> ans</p>
                    <div class="d-flex gap-2 mt-2">
                        <a href="<?= BASE_URL ?>/views/ficheChat.php?id=<?= htmlspecialchars($chat['id']) ?>" class="btn btn-sm" style="background-color:#e8722a; color:white;">Voir</a>
                        <a href="<?= CTRL_URL ?>/FavoriController.php?id_chat=<?= htmlspecialchars($chat['id']) ?>&action=supprimer" class="btn btn-sm" style="background-color:#5a4a3a; color:white;" onclick="return confirm('Retirer des favoris ?')">Retirer</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php require_once ROOT_PATH . '/public/includes/footer.php'; ?>