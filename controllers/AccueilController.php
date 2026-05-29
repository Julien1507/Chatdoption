<?php
/* session_start(); */
require_once __DIR__ . '/../config/db.php';
require_once ROOT_PATH . '/models/ChatModel.php';

$chats = getTroisChats($pdo);

require_once ROOT_PATH . '/public/views/accueil.php';