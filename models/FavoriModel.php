<?php
function getFavoris($pdo, $id_utilisateur) {
    $stmt = $pdo->prepare("SELECT chats.* FROM favoris JOIN chats ON favoris.id_chat = chats.id WHERE favoris.id_utilisateur = :id");
    $stmt->execute(['id' => $id_utilisateur]);
    return $stmt->fetchAll();
}

function ajouterFavori($pdo, $id_utilisateur, $id_chat) {
    $stmt = $pdo->prepare("INSERT IGNORE INTO favoris (id_utilisateur, id_chat) VALUES (:id_utilisateur, :id_chat)");
    $stmt->execute(['id_utilisateur' => $id_utilisateur, 'id_chat' => $id_chat]);
}

function supprimerFavori($pdo, $id_utilisateur, $id_chat) {
    $stmt = $pdo->prepare("DELETE FROM favoris WHERE id_utilisateur = :id_utilisateur AND id_chat = :id_chat");
    $stmt->execute(['id_utilisateur' => $id_utilisateur, 'id_chat' => $id_chat]);
}