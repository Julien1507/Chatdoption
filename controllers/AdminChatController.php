<?php
session_start();
require_once __DIR__ . '/../config/db.php';
require_once ROOT_PATH . '/models/ChatModel.php';

/* redirige si pas admin */
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: " . BASE_URL . "/views/connexion.php");
    exit;
}

// Actions
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($_GET['action'] == 'supprimer') {
        deleteChat($pdo, $id);
        header("Location: " . CTRL_URL . "/AdminChatController.php");
        exit;
    }
    if ($_GET['action'] == 'statut') {
        updateStatut($pdo, $id, $_GET['statut']);
        header("Location: " . CTRL_URL . "/AdminChatController.php");
        exit;
    }
}

// Modifier
if (isset($_POST['modifier'])) {
    updateChat($pdo, $_POST['id'], $_POST['nom'], $_POST['age'], $_POST['sexe'], $_POST['race'], $_POST['description'], $_POST['image']);
    header("Location: " . CTRL_URL . "/AdminChatController.php");
    exit;
}

// Ajouter
if (isset($_POST['ajouter'])) {
    addChat($pdo, $_POST['nom'], $_POST['age'], $_POST['sexe'], $_POST['race'], $_POST['description'], $_POST['statut'], $_POST['date_arrivee'], $_POST['image']);
    header("Location: " . CTRL_URL . "/AdminChatController.php");
    exit;
}

// Filtres
$recherche = isset($_GET['recherche']) ? $_GET['recherche'] : null;
$statut    = isset($_GET['statut'])    ? $_GET['statut']    : null;
$sexe      = isset($_GET['sexe'])      ? $_GET['sexe']      : null;
$chats     = getAllChats($pdo, $recherche, $statut, $sexe);
$chatDetail = isset($_GET['id']) ? getChatById($pdo, $_GET['id']) : null;

require_once ROOT_PATH . '/public/views/admin/AdminChats.php';