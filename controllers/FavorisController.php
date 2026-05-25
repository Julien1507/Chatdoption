<?php
session_start();
require_once ROOT_PATH . '/config/db.php';
require_once ROOT_PATH . '/models/UserModel.php';
require_once ROOT_PATH . '/public/views/inscription.php';

if (!isset($_SESSION['user'])) {
    header("Location: " . BASE_URL . "/views/connexion.php");
    exit;
}

$id_utilisateur = $_SESSION['user']['id'];
$id_chat        = $_GET['id_chat'];
$action         = $_GET['action'];

if ($action == 'ajouter') {
    ajouterFavori($pdo, $id_utilisateur, $id_chat);
} elseif ($action == 'supprimer') {
    supprimerFavori($pdo, $id_utilisateur, $id_chat);
}

header("Location: " . BASE_URL . "/views/favoris.php");
exit;