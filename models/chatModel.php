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


/* admin */

function addChat($pdo, $nom, $age, $sexe, $race, $description, $statut, $date_arrivee, $image) {
    $stmt = $pdo->prepare("INSERT INTO chats (nom, age, sexe, race, description, statut, date_arrivee, image) VALUES (:nom, :age, :sexe, :race, :description, :statut, :date_arrivee, :image)");
    $stmt->execute(compact('nom', 'age', 'sexe', 'race', 'description', 'statut', 'date_arrivee', 'image'));
}

function updateChat($pdo, $id, $nom, $age, $sexe, $race, $description, $image) {
    $stmt = $pdo->prepare("UPDATE chats SET nom=:nom, age=:age, sexe=:sexe, race=:race, description=:description, image=:image WHERE id=:id");
    $stmt->execute(compact('nom', 'age', 'sexe', 'race', 'description', 'image', 'id'));
}

function updateStatut($pdo, $id, $statut) {
    $stmt = $pdo->prepare("UPDATE chats SET statut=:statut WHERE id=:id");
    $stmt->execute(['statut' => $statut, 'id' => $id]);
}

function deleteChat($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM chats WHERE id=:id");
    $stmt->execute(['id' => $id]);
}

function getAllChats($pdo, $recherche = null, $statut = null, $sexe = null) {
    $where = [];
    $params = [];
    if ($recherche) { $where[] = "nom LIKE :recherche"; $params['recherche'] = '%' . $recherche . '%'; }
    if ($statut)    { $where[] = "statut = :statut";    $params['statut']    = $statut; }
    if ($sexe)      { $where[] = "sexe = :sexe";        $params['sexe']      = $sexe; }
    $sql = "SELECT * FROM chats" . (!empty($where) ? " WHERE " . implode(" AND ", $where) : "") . " ORDER BY id DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll();
}