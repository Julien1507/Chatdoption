<?php
function getDemandesByUser($pdo, $id_utilisateur) {
    $stmt = $pdo->prepare("
        SELECT demandes_adoption.*, chats.nom, chats.image, demandes_adoption.statut 
        FROM demandes_adoption 
        JOIN chats ON demandes_adoption.id_chat = chats.id 
        WHERE demandes_adoption.id_utilisateur = :id
    ");
    $stmt->execute(['id' => $id_utilisateur]);
    return $stmt->fetchAll();
}


function creerDemande($pdo, $id_utilisateur, $id_chat, $message) {
    $stmt = $pdo->prepare("INSERT INTO demandes_adoption (id_utilisateur, id_chat, message) VALUES (:id_utilisateur, :id_chat, :message)");
    $stmt->execute([
        'id_utilisateur' => $id_utilisateur,
        'id_chat'        => $id_chat,
        'message'        => $message
    ]);
}


/* Admin */

function getAllDemandes($pdo, $recherche = null, $statut = null) {
    $where = [];
    $params = [];
    if ($recherche) { $where[] = "utilisateurs.nom LIKE :recherche"; $params['recherche'] = '%' . $recherche . '%'; }
    if ($statut)    { $where[] = "demandes_adoption.statut = :statut"; $params['statut'] = $statut; }
    $sql = "SELECT demandes_adoption.*, utilisateurs.nom, utilisateurs.prenom, utilisateurs.email, chats.nom AS nom_chat
            FROM demandes_adoption
            JOIN utilisateurs ON demandes_adoption.id_utilisateur = utilisateurs.id
            JOIN chats ON demandes_adoption.id_chat = chats.id"
            . (!empty($where) ? " WHERE " . implode(" AND ", $where) : "")
            . " ORDER BY date_demande DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll();
}

function getDemandeById($pdo, $id) {
    $stmt = $pdo->prepare("
        SELECT demandes_adoption.*, utilisateurs.nom, utilisateurs.prenom, utilisateurs.email,
            chats.nom AS nom_chat, chats.age AS age_chat
        FROM demandes_adoption
        JOIN utilisateurs ON demandes_adoption.id_utilisateur = utilisateurs.id
        JOIN chats ON demandes_adoption.id_chat = chats.id
        WHERE demandes_adoption.id = :id
    ");
    $stmt->execute(['id' => $id]);
    return $stmt->fetch();
}

function updateStatutDemande($pdo, $id, $statut) {
    $stmt = $pdo->prepare("UPDATE demandes_adoption SET statut = :statut WHERE id = :id");
    $stmt->execute(['statut' => $statut, 'id' => $id]);
}