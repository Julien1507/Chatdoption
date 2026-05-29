<?php
require_once __DIR__ . '/../config/db.php';
require_once ROOT_PATH . '/models/DemandeModel.php';


if (!isset($_SESSION['user'])) {
    header("Location: " . BASE_URL . "?url=connexion");
    exit;
}

$demandes = getDemandesByUser($pdo, $_SESSION['user']['id']);

require_once ROOT_PATH . '/public/views/mesdemandes.php';