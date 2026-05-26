<?php 
require_once 'C:/wamp64/www/LBD/Chatdoption/config/db.php';
require_once ROOT_PATH . '/public/includes/header.php';
require_once ROOT_PATH . '/models/ChatModel.php';

$chat = getChatById($pdo, $_GET['id']);

?>

<div class="container my-4">
    <div class="row">

        <div class="col-12 col-lg-6 mb-3">
            <img src="<?= BASE_URL ?>/images/<?= $chat['image'] ?>" alt="<?= $chat['nom'] ?>" style="width:100%; height: 500px; border-radius: 4px; object-fit: cover;">
        </div>

        <div class="col-12 col-lg-6">
            <div class="p-4" style="background-color: #3a2a1a; color: #d4a96a; border-radius: 4px;">
                <h2><?= $chat['nom'] ?></h2>
                <p>Age : <?= $chat['age'] ?> ans</p>
                <p>Sexe : <?= $chat['sexe'] ?></p>
                <p>Race : <?= $chat['race'] ?></p>
                <hr style="border-color: #d4a96a;">
                <p><?= $chat['description'] ?></p>
            </div>

            <div class="d-flex gap-2 mt-3 flex-wrap">
                <a href="<?= BASE_URL ?>/views/adoption.php?id=<?= $chat['id'] ?>" class="btn" style="background-color: #e8722a; color: white;">Remplir le formulaire d'adoption</a>
                <a href="<?= CTRL_URL ?>/FavorisController.php?id_chat=<?= $chat['id'] ?>&action=ajouter" class="btn" style="background-color: #e8722a; color: white;">Ajouter en favoris</a>
            </div>
</div>

<?php require_once ROOT_PATH . '/public/includes/footer.php'; ?>