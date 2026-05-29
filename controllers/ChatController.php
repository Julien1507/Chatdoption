<?php
require_once __DIR__ . '/../config/db.php';
require_once ROOT_PATH . '/models/ChatModel.php';

$chats = getChats($pdo);


/* filtre */
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

require_once ROOT_PATH . '/public/views/chats.php';