<?php
session_start();
require_once __DIR__ . '/../config/db.php';
require_once ROOT_PATH . '/models/FavoriModel.php';

if (!isset($_SESSION['user'])) {
    header("Location: " . BASE_URL . "/views/connexion.php");
    exit;
}

$id_utilisateur = $_SESSION['user']['id'];

//  ajouter/supprimer
if (isset($_GET['action']) && isset($_GET['id_chat'])) {
    if ($_GET['action'] == 'ajouter') {
        ajouterFavori($pdo, $id_utilisateur, $_GET['id_chat']);
    } elseif ($_GET['action'] == 'supprimer') {
        supprimerFavori($pdo, $id_utilisateur, $_GET['id_chat']);
    }
    header("Location: " . CTRL_URL . "/FavoriController.php");
    exit;
}

// Affichage
$favoris = getFavoris($pdo, $id_utilisateur);
require_once ROOT_PATH . '/public/views/favoris.php';