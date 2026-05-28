<?php
session_start();
require_once __DIR__ . '/../config/db.php';
require_once ROOT_PATH . '/models/UserModel.php';

if (!isset($_SESSION['user'])) {
    header("Location: " . BASE_URL . "/views/connexion.php");
    exit;
}

$id      = $_SESSION['user']['id'];
$user    = getUserById($pdo, $id);
$success = "";
$error   = "";

if (isset($_POST['nom'])) {
    updateUser($pdo, $id, $_POST['nom'], $_POST['prenom'], $_POST['email']);
    $_SESSION['user']['nom']    = $_POST['nom'];
    $_SESSION['user']['prenom'] = $_POST['prenom'];
    $_SESSION['user']['email']  = $_POST['email'];
    $success = "Profil mis à jour !";
}

if (isset($_POST['mdp'])) {
    if ($_POST['mdp'] !== $_POST['mdp_confirm']) {
        $error = "Les mots de passe ne correspondent pas";
    } else {
        updateMdp($pdo, $id, $_POST['mdp']);
        $success = "Mot de passe mis à jour !";
    }
}

require_once ROOT_PATH . '/public/views/profil.php';