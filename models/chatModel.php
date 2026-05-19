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