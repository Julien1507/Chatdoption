<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user'])) {
    header("Location: " . BASE_URL . "/views/connexion.php");
    exit;
}

if (isset($_POST['id_chat'])) {
    $id_utilisateur = $_SESSION['user']['id'];
    $id_chat        = $_POST['id_chat'];
    $message        = "Logement: " . $_POST['logement'] . 
                    " | Propriétaire: " . $_POST['proprietaire'] . 
                    " | Animaux autorisés: " . $_POST['animaux_autorises'] . 
                    " | Extérieur: " . $_POST['exterieur'] . 
                    " | Enfants: " . $_POST['enfants'] . 
                    " | Age enfants: " . $_POST['age_enfants'] . 
                    " | Autres animaux: " . $_POST['autres_animaux'] . 
                    " | Temps seul: " . $_POST['temps_seul'] . 
                    " | Travail: " . $_POST['travail'] . 
                    " | Motivation: " . $_POST['message'];

    $stmt = $pdo->prepare("INSERT INTO demandes_adoption (id_utilisateur, id_chat, message) VALUES (:id_utilisateur, :id_chat, :message)");
    $stmt->execute([
        'id_utilisateur' => $id_utilisateur,
        'id_chat'        => $id_chat,
        'message'        => $message
    ]);

    $_SESSION['success'] = "Votre demande d'adoption a bien été envoyée !";
    header("Location: " . BASE_URL . "/views/chats.php");
    exit;
}