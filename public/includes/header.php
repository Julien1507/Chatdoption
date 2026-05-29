<?php 
/* verifie si une session est active avant d'en demarrer une */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../../config/db.php';?>
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
                <a href="<?= BASE_URL ?>?url=accueil">Accueil</a>
                <a href="<?= BASE_URL ?>?url=chats">Voir les chats</a>
                <a href="<?= BASE_URL ?>?url=contact">Contact</a>
                <a href="<?= BASE_URL ?>?url=demandes">Mes demandes</a>
                <a href="<?= BASE_URL ?>?url=favoris">Favoris</a>
                <div class="ms-lg-auto d-flex flex-column flex-lg-row gap-2">

                <!-- log -->
                <?php if (isset($_SESSION['user'])): ?>
                    <a href="<?= BASE_URL ?>?url=profil">Mon profil</a>
                    <a href="<?= BASE_URL ?>?url=deconnexion">Déconnexion</a>
                <?php else: ?>
                    <a href="<?= BASE_URL ?>?url=inscription">Inscription</a>
                    <a href="<?= BASE_URL ?>?url=connexion">Connexion</a>
                <?php endif; ?>
                <!-- admin -->
                <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
                    <a href="<?= BASE_URL ?>?url=admin">Admin</a>
                <?php endif; ?>
                    
                </div>
            </div>
        </div>
</nav>