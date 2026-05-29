<?php
session_start();
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/public/includes/header.php';

$url = isset($_GET['url']) ? trim($_GET['url'], '/') : 'accueil';

switch ($url) {
    case 'accueil':
        require_once ROOT_PATH . '/controllers/ChatController.php';
        break;
    case 'chats':
        require_once ROOT_PATH . '/controllers/ChatController.php';
        break;
    case 'connexion':
        require_once ROOT_PATH . '/controllers/connexionController.php';
        break;
    case 'inscription':
        require_once ROOT_PATH . '/controllers/AuthController.php';
        break;
    case 'deconnexion':
        require_once ROOT_PATH . '/controllers/deconnexionController.php';
        break;
    case 'profil':
        require_once ROOT_PATH . '/controllers/ProfilController.php';
        break;
    case 'favoris':
        require_once ROOT_PATH . '/controllers/FavoriController.php';
        break;
    case 'demandes':
        require_once ROOT_PATH . '/controllers/DemandeController.php';
        break;
    case 'adoption':
        require_once ROOT_PATH . '/controllers/adoptionController.php';
        break;
    case 'contact':
        require_once ROOT_PATH . '/public/views/contact.php';
        break;
    case 'admin':
        require_once ROOT_PATH . '/public/views/admin/dashboard.php';
        break;
    case 'admin/chats':
        require_once ROOT_PATH . '/controllers/AdminChatController.php';
        break;
    case 'admin/demandes':
        require_once ROOT_PATH . '/controllers/AdminDemandesController.php';
        break;
    case 'admin/users':
        require_once ROOT_PATH . '/controllers/AdminUserController.php';
        break;
    default:
        http_response_code(404);
        echo '<h1>404 - Page introuvable</h1>';
        break;
}

<div style="position: relative;">
    <img src="images/banner.png" alt="banner" style="width:100%; height: 300px; object-fit: cover;">
    <div style="position: absolute; top: 50%; right: 45%; transform: translateY(-50%); color: #e8722a; font-size: 1.5rem; font-weight: bold; text-align: left;">
        Trouvez le chat qui va<br>changer votre quotidien.
    </div>
</div>


<div class="container my-4 text-center" style="color: #4a3728;">
    <p><strong>Avant d'adopter un chaton, prenez le temps de la réflexion !</strong></p>
    <p class="small">Les chatons, c'est drôle et amusant mais c'est aussi très remuant et peut-être parfois aussi très énervant. Pensez-y si vous cherchez un chat doux, calme et câlin - les chats plus âgés répondent mieux à ces conditions et ils méritent tout votre amour. Tous nos chatons ne partent que s'ils sont pré-vaccinés, stérilisés et identifiés, conformément à la loi.</p>
</div>

<div class="text-center my-4">
    <a href="<?= CTRL_URL ?>/ChatController.php" class="btn px-5 py-3" style="background-color: #e8722a; color: white; font-size: 1.1rem; border-radius: 50px;">
        🐾 Voir tous nos chats
    </a>
</div>

<div class="container my-4">
    <h2 class="text-center py-2 mb-4" style="background-color: #4a3728; color: #d4a96a; border-radius: 4px;">Chats du jour</h2>
<!-- for each pour afficher les 3 chats  -->
    <div class="row align-items-stretch">
        <?php foreach($chats as $chat): ?>
        <div class="col-12 col-lg-4 mb-3 d-flex">
            <div class="border p-2" style="background-color: #3a2a1a; color: #d4a96a; border-radius: 4px; width: 100%;">
                <img src="<?= BASE_URL ?>/images/<?= $chat['image'] ?>" alt="<?= $chat['nom'] ?>" style="width:100%; height: 180px; object-fit: cover;">
                <p class="mt-2 mb-0 small">Nom : <?= $chat['nom'] ?></p>
                <p class="mb-0 small">Age : <?= $chat['age'] ?> ans</p>
                <p class="mb-0 small">Race : <?= $chat['race'] ?></p>
                <p class="mb-0 small" style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;"><?= $chat['description'] ?></p>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>

<?php require_once ROOT_PATH . '/public/includes/footer.php';?>