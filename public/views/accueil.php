<?php require_once ROOT_PATH . '/public/includes/header.php'; ?>

<div style="position: relative;">
    <img src="<?= BASE_URL ?>images/banner.png" alt="banner" style="width:100%; height: 300px; object-fit: cover;">
    <div style="position: absolute; top: 50%; right: 45%; transform: translateY(-50%); color: #e8722a; font-size: 1.5rem; font-weight: bold; text-align: left;">
        Trouvez le chat qui va<br>changer votre quotidien.
    </div>
</div>

<div class="container my-4 text-center" style="color: #4a3728;">
    <p><strong>Avant d'adopter un chaton, prenez le temps de la réflexion !</strong></p>
</div>

<div class="text-center my-4">
    <a href="<?= BASE_URL ?>?url=chats" class="btn px-5 py-3" style="background-color: #e8722a; color: white; font-size: 1.1rem; border-radius: 50px;">
        🐾 Voir tous nos chats
    </a>
</div>

<div class="container my-4">
    <h2 class="text-center py-2 mb-4" style="background-color: #4a3728; color: #d4a96a; border-radius: 4px;">Chats du jour</h2>
    <div class="row align-items-stretch">
        <?php foreach($chats as $chat): ?>
        <div class="col-12 col-lg-4 mb-3 d-flex">
            <div href="<?= BASE_URL ?>?url=chats&id=<?= $chat['id'] ?>" class="border p-2" style="background-color: #3a2a1a; color: #d4a96a; border-radius: 4px; width: 100%;">
                <img src="<?= BASE_URL ?>images/<?= $chat['image'] ?>" style="width:100%; height: 180px; object-fit: cover;">
                <p class="mt-2 mb-0 small">Nom : <?= $chat['nom'] ?></p>
                <p class="mb-0 small">Age : <?= $chat['age'] ?> ans</p>
                <p class="mb-0 small">Race : <?= $chat['race'] ?></p>
                <p class="mb-0 small" style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;"><?= $chat['description'] ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require_once ROOT_PATH . '/public/includes/footer.php'; ?>