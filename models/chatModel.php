<?php


/* chopper les chats */
function getChats($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM chats WHERE statut = 'disponible'");
    $stmt->execute();
    return $stmt->fetchAll();
}



/* chopper 3 chats pour index */
function getTroisChats($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM chats WHERE statut = 'disponible' LIMIT 3");
    $stmt->execute();
    return $stmt->fetchAll();
}

function getChatById($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM chats WHERE id = :id");
    $stmt->execute(['id' => $id]);
    return $stmt->fetch();
}

/* ajouter un favori */
function ajouterFavori($pdo, $id_utilisateur, $id_chat) {
    $stmt = $pdo->prepare("INSERT IGNORE INTO favoris (id_utilisateur, id_chat) VALUES (:id_utilisateur, :id_chat)");
    $stmt->execute(['id_utilisateur' => $id_utilisateur, 'id_chat' => $id_chat]);
}

/* récupérer les favoris d'un utilisateur */
function getFavoris($pdo, $id_utilisateur) {
    $stmt = $pdo->prepare("SELECT chats.* FROM favoris JOIN chats ON favoris.id_chat = chats.id WHERE favoris.id_utilisateur = :id");
    $stmt->execute(['id' => $id_utilisateur]);
    return $stmt->fetchAll();
}

/* supprimer un favori */
function supprimerFavori($pdo, $id_utilisateur, $id_chat) {
    $stmt = $pdo->prepare("DELETE FROM favoris WHERE id_utilisateur = :id_utilisateur AND id_chat = :id_chat");
    $stmt->execute(['id_utilisateur' => $id_utilisateur, 'id_chat' => $id_chat]);
}