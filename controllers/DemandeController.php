<?php
session_start();
require_once '../config/db.php';
require_once '../models/DemandeModel.php';

if (!isset($_SESSION['user'])) {
    header("Location: " . BASE_URL . "/views/connexion.php");
    exit;
}

$demandes = getDemandesByUser($pdo, $_SESSION['user']['id']);

require_once '../public/views/mesdemandes.php';