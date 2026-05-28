<?php
session_start();
require_once __DIR__ . '/../config/db.php';
require_once ROOT_PATH . '/models/DemandeModel.php';

if (!isset($_SESSION['user'])) {
    header("Location: " . CTRL_URL . "/connexionController.php");
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

/* try and catch pour gérer l'erreur adoption unique */
try {
    creerDemande($pdo, $id_utilisateur, $id_chat, $message);
    $_SESSION['success'] = "Votre demande d'adoption a bien été envoyée !";
} catch (PDOException $e) {
    $_SESSION['error'] = "Vous avez déjà fait une demande pour ce chat !";
}

header("Location: " . CTRL_URL . "/ChatController.php");
exit;
}

require_once ROOT_PATH . '/public/views/adoption.php';