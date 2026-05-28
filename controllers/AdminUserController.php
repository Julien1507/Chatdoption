<?php
session_start();

require_once __DIR__ . '/../config/db.php';
require_once ROOT_PATH . '/models/UserModel.php';

/* redirige si pas admin */
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: " . BASE_URL . "/views/connexion.php");
    exit;
}
/* recherche */
$recherche = $_GET['recherche'] ?? null;

/* récupérer utilisateurs */
$utilisateurs = getAllUsers($pdo, $recherche);

/* détail utilisateur */
$userDetail = null;

if (isset($_GET['id'])) {
    $userDetail = getUserById($pdo, $_GET['id']);
}

/* actions */
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_GET['action'] == 'promouvoir') {
        updateRole($pdo, $id, 'admin');
    } elseif ($_GET['action'] == 'retrograder') {
        updateRole($pdo, $id, 'utilisateur');
    } elseif ($_GET['action'] == 'supprimer') {
        deleteUser($pdo, $id);
    }

    header("Location: " . BASE_URL . "/views/admin/dashboard.php");
    exit;
}

require_once ROOT_PATH . '/public/views/admin/AdminUsers.php';