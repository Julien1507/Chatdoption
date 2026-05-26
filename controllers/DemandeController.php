<?php
session_start();
require_once 'C:/wamp64/www/LBD/Chatdoption/config/db.php';
/* require_once ROOT_PATH . '/models/UserModel.php'; */
require_once ROOT_PATH . '/models/DemandeModel.php';


if (!isset($_SESSION['user'])) {
    header("Location: " . BASE_URL . "/views/connexion.php");
    exit;
}

$demandes = getDemandesByUser($pdo, $_SESSION['user']['id']);

require_once ROOT_PATH . '/public/views/mesdemandes.php';