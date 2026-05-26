<!-- le model ne fait que parler a la bd -->

<?php

/* check si utilisateur existe via email */
function findByEmail($pdo, $email) {
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = :email");
    $stmt->execute(['email' => $email]);
    return $stmt->fetch();
}

/* crée un nouvel utilisateur + hash le mdp */
function createUser($pdo, $nom, $prenom, $email, $mdp) {
    $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe) VALUES (:nom, :prenom, :email, :mot_de_passe)");
    $stmt->execute([
        'nom'          => $nom,
        'prenom'       => $prenom,
        'email'        => $email,
        'mot_de_passe' => $mdpHash
    ]);
}

/* check utilisateur + mdp */
function findByEmailAndMdp($pdo, $email, $mdp) {
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    // password_verify compare le mdp saisi avec le hash en bdd
    if ($user && password_verify($mdp, $user['mot_de_passe'])) {
        return $user;
    }
    return false;
}



/* Dashboard */


function getAllUsers($pdo, $recherche = null) {
    if ($recherche) {
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE nom LIKE :r OR prenom LIKE :r OR email LIKE :r ORDER BY date_inscription DESC");
        $stmt->execute(['r' => '%' . $recherche . '%']);
    } else {
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs ORDER BY date_inscription DESC");
        $stmt->execute();
    }
    return $stmt->fetchAll();
}

function getUserById($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE id = :id");
    $stmt->execute(['id' => $id]);
    return $stmt->fetch();
}

function updateRole($pdo, $id, $role) {
    $stmt = $pdo->prepare("UPDATE utilisateurs SET role = :role WHERE id = :id");
    $stmt->execute(['role' => $role, 'id' => $id]);
}

function deleteUser($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM utilisateurs WHERE id = :id");
    $stmt->execute(['id' => $id]);
}


/* update */

function updateUser($pdo, $id, $nom, $prenom, $email) {
    $stmt = $pdo->prepare("UPDATE utilisateurs SET nom = :nom, prenom = :prenom, email = :email WHERE id = :id");
    $stmt->execute(['nom' => $nom, 'prenom' => $prenom, 'email' => $email, 'id' => $id]);
}

function updateMdp($pdo, $id, $mdp) {
    $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("UPDATE utilisateurs SET mot_de_passe = :mdp WHERE id = :id");
    $stmt->execute(['mdp' => $mdpHash, 'id' => $id]);
}