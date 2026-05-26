<?php 
/* verifie si une session est active avant d'en demarrer une */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'C:/wamp64/www/LBD/Chatdoption/config/db.php';

require_once 'C:/wamp64/www/LBD/Chatdoption/config/db.php';?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chadoption</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar { background-color: #4a3728; }
        .navbar-brand { color: #d4a96a !important; font-weight: bold; }
        .btn-orange {
            background-color: #e8722a;
            color: white;
            border: none;
            margin-bottom: 6px;
        }
        @media (max-width: 991px) {
            .btn-orange { width: 100%; }
        }
        .btn-orange:hover { background-color: #c45e1a; color: white; 
        }
        body {
            background-color: #f5f0eb;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid px-3">

        <a class="navbar-brand" href="<?= BASE_URL ?>/index.php">🐾 chadoption</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" style="border-color: #e8722a;">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <div class="d-flex flex-column flex-lg-row align-items-center gap-2 w-100 mt-2 mt-lg-0">                
                <a href="<?= BASE_URL ?>/index.php" class="btn btn-orange">Accueil</a>
                <a href="<?= BASE_URL ?>/views/chats.php" class="btn btn-orange">Voir les chats</a>
                <a href="<?= BASE_URL ?>/contact.php" class="btn btn-orange">Contact</a>
                <a href="<?= CTRL_URL ?>/DemandeController.php" class="btn btn-orange">Mes demandes</a>
                <a href="<?= CTRL_URL ?>/FavoriController.php" class="btn btn-orange">Favoris</a>
                <div class="ms-lg-auto d-flex flex-column flex-lg-row gap-2">
                    <?php if (isset($_SESSION['user'])): ?>
                        <a href="<?= CTRL_URL ?>/ProfilController.php" class="btn btn-orange">Mon profil</a>
                        <a href="<?= CTRL_URL ?>/deconnexionController.php" class="btn btn-orange">Déconnexion</a>
                    <?php else: ?>
                        <a href="<?= BASE_URL ?>/views/inscription.php" class="btn btn-orange">Inscription</a>
                        <a href="<?= BASE_URL ?>/views/connexion.php" class="btn btn-orange">Connexion</a>
                    <?php endif; ?>
                            <!-- admin -->
                    
                        <a href="<?= CTRL_URL ?>/AdminController.php" class="btn btn-orange">Admin</a>
                    
                </div>
            </div>
        </div>
</nav>