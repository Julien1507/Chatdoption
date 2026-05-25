<?php 
require_once ROOT_PATH . '/public/includes/header.php';
require_once ROOT_PATH . '/config/db.php';
require_once ROOT_PATH . '/models/ChatModel.php';

$chats = getChats($pdo);
/* si recherche effectuée, array filter parcourt le tableau chats et garde ce que l'utilisateur a saisi */
if (isset($_GET['recherche']) && !empty($_GET['recherche'])) {
    $recherche = $_GET['recherche'];
    $chats = array_filter($chats, function($chat) use ($recherche) {
        return stripos($chat['nom'], $recherche) !== false;
    });
}

if (isset($_GET['sexe']) && !empty($_GET['sexe'])) {
    $sexe = $_GET['sexe'];
    $chats = array_filter($chats, function($chat) use ($sexe) {
        return $chat['sexe'] == $sexe;
    });
}

if (isset($_GET['age']) && !empty($_GET['age'])) {
    $chats = array_filter($chats, function($chat) {
        if ($_GET['age'] == 'chaton') return $chat['age'] < 1;
        if ($_GET['age'] == 'adulte') return $chat['age'] >= 1;
    });
}
?>

<div class="container my-4">
    <h2 class="text-center py-2 mb-4" style="background-color: #4a3728; color: #d4a96a; border-radius: 4px;">Nos chats prêts à l'adoption</h2>



<form method="GET" action="">
    <div class="row g-2 mb-4">
        <div class="col-12 col-lg-5">
            <input type="text" name="recherche" class="form-control" placeholder="🔍 Rechercher un chat..." style="border-radius: 50px; border: 2px solid #4a3728;" value="<?= isset($_GET['recherche']) ? $_GET['recherche'] : '' ?>">
        </div>
        <div class="col-6 col-lg-2">
            <select name="sexe" class="form-control" style="border-radius: 50px; border: 2px solid #4a3728;">
                <option value="">Tous les sexes</option>
                <option value="male" <?= isset($_GET['sexe']) && $_GET['sexe'] == 'male' ? 'selected' : '' ?>>Mâle</option>
                <option value="femelle" <?= isset($_GET['sexe']) && $_GET['sexe'] == 'femelle' ? 'selected' : '' ?>>Femelle</option>
            </select>
        </div>
        <div class="col-6 col-lg-2">
            <select name="age" class="form-control" style="border-radius: 50px; border: 2px solid #4a3728;">
                <option value="">Tous les âges</option>
                <option value="chaton">Chaton (- 1 an)</option>
                <option value="adulte">Adulte (+ 1 an)</option>
            </select>
        </div>
        <div class="col-12 col-lg-2">
            <button type="submit" class="btn w-100" style="background-color: #e8722a; color: white; border-radius: 50px;">Filtrer</button>
        </div>
    </div>
</form>

    <!-- affiche une carte pour chaque chat dans le tableau -->
    <div class="row" id="listechats">
        <?php foreach($chats as $chat): ?>
        <div class="col-12 col-lg-4 mb-3 d-flex chat-card">
            <a href="<?= BASE_URL ?>/views/ficheChat.php?id=<?= $chat['id'] ?>" class="w-100 text-decoration-none">
            <div class="border p-2 w-100" style="background-color: #3a2a1a; color: #d4a96a; border-radius: 4px;">
                <div class="border p-2 w-100" style="background-color: #3a2a1a; color: #d4a96a; border-radius: 4px;">
                    <img src="<?= BASE_URL ?>/images/<?= $chat['image'] ?>" alt="<?= $chat['nom'] ?>" style="width:100%; height: 180px; object-fit: cover;">
                    <p class="mt-2 mb-0 small" data-nom="<?= strtolower($chat['nom']) ?>">Nom : <?= $chat['nom'] ?></p>
                    <p class="mb-0 small">Age : <?= $chat['age'] ?> ans</p>
                    <p class="mb-0 small">Race : <?= $chat['race'] ?></p>
                    <p class="mb-0 small" style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;"><?= $chat['description'] ?></p>
                </div>
            </div>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require_once ROOT_PATH . '/public/includes/footer.php'; ?>