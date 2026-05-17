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