<?php
session_start();

require_once '../config/db.php';
require_once '../config/helpers.php';
require_once '../models/UserModel.php';

$nomError    = "";
$prenomError = "";
$emailError  = "";
$mdpError    = "";

if (isset($_POST['nom'])) {
    $nom    = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email  = $_POST['email'];
    $mdp    = $_POST['mdp'];

    // validation
    if (!nomValide($nom))       $nomError    = "Nom invalide (au moins 2 lettres)";
    if (!prenomValide($prenom)) $prenomError = "Prénom invalide (au moins 2 lettres)";
    if (!emailValide($email))   $emailError  = "Email invalide";
    if (!mdpValide($mdp))       $mdpError    = "Mot de passe invalide (6 caractères min, 1 majuscule, 1 chiffre)";

    // si pas d'erreur on vérifie la bdd
    if (!$nomError && !$prenomError && !$emailError && !$mdpError) {

        $userExistant = findByEmail($pdo, $email);

        if ($userExistant) {
            $emailError = "Cet email est déjà utilisé";
        } else {
            createUser($pdo, $nom, $prenom, $email, $mdp);
            $_SESSION['success'] = "Inscription réussie, vous pouvez vous connecter !";
            header("Location: " . BASE_URL . "/views/connexion.php");
            exit;
        }
    }
}


require_once '../public/views/inscription.php';