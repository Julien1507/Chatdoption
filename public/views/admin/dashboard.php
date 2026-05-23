<?php
require_once '../../includes/header.php';
require_once '../../../config/db.php';

// admin ?
/* if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: " . BASE_URL . "/views/connexion.php");
    exit;
} */

// stats globales
$nbUtilisateurs = $pdo->query("SELECT COUNT(*) FROM utilisateurs")->fetchColumn();
$nbChats        = $pdo->query("SELECT COUNT(*) FROM chats")->fetchColumn();
$nbDemandes     = $pdo->query("SELECT COUNT(*) FROM demandes_adoption")->fetchColumn();

// Activité récente — 5 dernières demandes
$activite = $pdo->query("
    SELECT demandes_adoption.date_demande, utilisateurs.prenom, utilisateurs.nom, chats.nom AS nom_chat
    FROM demandes_adoption
    JOIN utilisateurs ON demandes_adoption.id_utilisateur = utilisateurs.id
    JOIN chats ON demandes_adoption.id_chat = chats.id
    ORDER BY date_demande DESC
    LIMIT 5
")->fetchAll();
?>

<div class="container my-4">
    <h2 class="text-center py-2 mb-4" style="background-color: #4a3728; color: #d4a96a; border-radius: 4px;">Dashboard</h2>

    <div class="row gap-4 justify-content-center">

        <!-- stat -->
        <div class="col-12 col-lg-6">
            <h5 class="text-center mb-3" style="color: #4a3728;">Statistiques / overview</h5>
            <table class="table text-center" style="background-color: #f5f0eb;">
                <thead style="background-color: #4a3728; color: #d4a96a;">
                    <tr>
                        <th>Utilisateurs</th>
                        <th>Chats</th>
                        <th>Demandes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $nbUtilisateurs ?></td>
                        <td><?= $nbChats ?></td>
                        <td><?= $nbDemandes ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Activité récente -->
        <div class="col-12 col-lg-4">
            <h5 class="text-center mb-3" style="color: #4a3728;">Activité récente</h5>
            <div class="p-3" style="background-color: #f5f0eb; border: 1px solid #4a3728; border-radius: 4px;">
                <ul class="mb-0">
                    <?php foreach($activite as $a): ?>
                        <li class="small">Demande de <?= $a['prenom'] ?> <?= $a['nom'] ?> → <?= $a['nom_chat'] ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

    </div>

    <!-- Accès rapide -->
    <h5 class="text-center mt-5 mb-3" style="color: #4a3728;">Accès rapide</h5>
    <div class="row justify-content-center gap-3">
        <div class="col-12 col-lg-3">
            <a href="<?= BASE_URL ?>/views/admin/demandes.php" class="btn w-100 py-4" style="background-color: #e8722a; color: white; font-size: 1.1rem;">Gérer les demandes</a>
        </div>
        <div class="col-12 col-lg-3">
            <a href="<?= BASE_URL ?>/views/admin/chats.php" class="btn w-100 py-4" style="background-color: #e8722a; color: white; font-size: 1.1rem;">Gérer les chats</a>
        </div>
        <div class="col-12 col-lg-3">
            <a href="<?= BASE_URL ?>/views/admin/utilisateurs.php" class="btn w-100 py-4" style="background-color: #e8722a; color: white; font-size: 1.1rem;">Gérer les utilisateurs</a>
        </div>
    </div>

</div>

<?php require_once '../../includes/footer.php'; ?>