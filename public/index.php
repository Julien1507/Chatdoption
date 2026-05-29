<?php
session_start();
require_once __DIR__ . '/../config/db.php';

$url = isset($_GET['url']) ? trim($_GET['url'], '/') : 'accueil';

switch ($url) {
    case 'accueil':
        require_once ROOT_PATH . '/controllers/AccueilController.php';
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
    case 'ficheChat':
        require_once ROOT_PATH . '/public/views/ficheChat.php';
        break;
    default:
        http_response_code(404);
        echo '<h1>404 - Page introuvable</h1>';
        break;
}