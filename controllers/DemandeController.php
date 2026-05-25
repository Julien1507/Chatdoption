<?php
session_start();
require_once ROOT_PATH . '/config/db.php';
require_once ROOT_PATH . '/models/UserModel.php';
require_once ROOT_PATH . '/public/views/inscription.php';

if (!isset($_SESSION['user'])) {
    header("Location: " . BASE_URL . "/views/connexion.php");
    exit;
}

$demandes = getDemandesByUser($pdo, $_SESSION['user']['id']);

require_once ROOT_PATH . '/public/views/mesdemandes.php';