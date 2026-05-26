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