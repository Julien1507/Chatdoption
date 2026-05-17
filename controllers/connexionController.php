<?php
require_once '../config/db.php';
require_once '../models/UserModel.php';

$error = "";

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $mdp   = $_POST['mdp'];

    $user = findByEmailAndMdp($pdo, $email, $mdp);

    if ($user) {
        //  stocke les infos utiles en session
        $_SESSION['user'] = [
            'id'    => $user['id'],
            'nom'   => $user['nom'],
            'prenom'=> $user['prenom'],
            'email' => $user['email'],
            'role'  => $user['role']
        ];
        header("Location: ../public/index.php");
        exit;
    } else {
        $error = "Email ou mot de passe incorrect";
    }
}

require_once '../views/connexion.php';