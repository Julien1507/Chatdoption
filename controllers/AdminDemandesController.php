<?php

require_once __DIR__ . '/../config/db.php';
require_once ROOT_PATH . '/models/DemandeModel.php';

/* redirige si pas admin */
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: " . BASE_URL . "?url=connexion");
    exit;
}

/*  accepter/refuser */
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($_GET['action'] == 'accepter') {
        updateStatutDemande($pdo, $id, 'accepte');
    } elseif ($_GET['action'] == 'refuser') {
        updateStatutDemande($pdo, $id, 'refuse');
    }
    header("Location: " . BASE_URL . "?url=admin/demandes");
    exit;
}

/* Filtres */
$recherche      = isset($_GET['recherche']) ? $_GET['recherche'] : null;
$statut         = isset($_GET['statut'])    ? $_GET['statut']    : null;
$demandes       = getAllDemandes($pdo, $recherche, $statut);
$demandeDetail  = isset($_GET['id']) ? getDemandeById($pdo, $_GET['id']) : null;

require_once ROOT_PATH . '/public/views/admin/AdminDemandes.php';