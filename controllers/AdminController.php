<?php
session_start();
require_once '../config/db.php';
require_once '../models/UserModel.php';

/* connecté ? */
if (!isset($_SESSION['user'])) {
    header("Location: " . BASE_URL . "/views/connexion.php");
    exit;
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
    header("Location: " . BASE_URL . "/views/admin/utilisateurs.php");
    exit;
}

require_once '../public/views/admin/utilisateurs.php';