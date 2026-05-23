<?php
require_once '../../includes/header.php';
require_once '../../../config/db.php';

 /* Filtre */ 
/* les % veulent dire peu importe ce qu'il y autour */
$where = "";
$params = [];
if (isset($_GET['recherche']) && !empty($_GET['recherche'])) {
    $where = "WHERE nom LIKE :recherche OR prenom LIKE :recherche OR email LIKE :recherche";
    $params['recherche'] = '%' . $_GET['recherche'] . '%';
}

$stmt = $pdo->prepare("SELECT * FROM utilisateurs $where ORDER BY date_inscription DESC");
$stmt->execute($params);
$utilisateurs = $stmt->fetchAll();

/* Détail utilisateur sélectionné */
/* avec get quand on clique sur voir, l'id de l'utilisateur est affiché dans l'url et sur le tableau */
$userDetail = null;
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE id = :id");
    $stmt->execute(['id' => $_GET['id']]);
    $userDetail = $stmt->fetch();
}

/* Actions */
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($_GET['action'] == 'promouvoir') {
        $pdo->prepare("UPDATE utilisateurs SET role = 'admin' WHERE id = :id")->execute(['id' => $id]);
    } elseif ($_GET['action'] == 'retrograder') {
        $pdo->prepare("UPDATE utilisateurs SET role = 'utilisateur' WHERE id = :id")->execute(['id' => $id]);
    } elseif ($_GET['action'] == 'supprimer') {
        $pdo->prepare("DELETE FROM utilisateurs WHERE id = :id")->execute(['id' => $id]);
    }
    header("Location: " . BASE_URL . "/views/admin/utilisateurs.php");
    exit;
}
?>

<div class="container my-4">
    <h2 class="text-center py-2 mb-4" style="background-color: #e8722a; color: white; border-radius: 4px;">Gestion des utilisateurs</h2>

    <div class="row">

        <!-- Gauche : filtre + tableau -->
        <div class="col-12 col-lg-7">

            <!-- Filtre -->
            <h5 class="text-center mb-3" style="color: #4a3728;">Filtres</h5>
            <form method="GET" action="">
                <div class="p-3 mb-4" style="background-color: #4a3728; border-radius: 4px;">
                    <div class="d-flex align-items-center gap-3">
                        <label style="color: #e8722a; white-space:nowrap;">Recherche</label>
                        <input type="text" name="recherche" class="form-control" value="<?= isset($_GET['recherche']) ? $_GET['recherche'] : '' ?>">
                        <button type="submit" class="btn" style="background-color:#e8722a; color:white;">OK</button>
                    </div>
                </div>
            </form>

            <!-- Tableau -->
            <h5 class="text-center mb-3" style="color: #4a3728;">Liste des utilisateurs</h5>
            <table class="table table-bordered text-center small">
                <thead style="background-color: #4a3728; color: #d4a96a;">
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Inscription</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($utilisateurs as $u): ?>
                    <tr>
                        <td><?= $u['nom'] ?></td>
                        <td><?= $u['prenom'] ?></td>
                        <td><?= $u['email'] ?></td>
                        <td><?= $u['role'] ?></td>
                        <td><?= date('d/m/Y', strtotime($u['date_inscription'])) ?></td>
                        <td>
                            <a href="?id=<?= $u['id'] ?>" class="btn btn-sm" style="background-color:#4a3728; color:#d4a96a;">Voir</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Droite : détail -->
        <div class="col-12 col-lg-4 offset-lg-1">
            <h5 class="text-center mb-3" style="color: #4a3728;">Détail utilisateur</h5>
            <div class="p-3 mb-3" style="border: 1px solid #4a3728; border-radius: 4px;">
                <?php if ($userDetail): ?>
                    <p class="mb-1 small"><strong>Nom :</strong> <?= $userDetail['nom'] ?></p>
                    <p class="mb-1 small"><strong>Prénom :</strong> <?= $userDetail['prenom'] ?></p>
                    <p class="mb-1 small"><strong>Email :</strong> <?= $userDetail['email'] ?></p>
                    <p class="mb-1 small"><strong>Date inscription :</strong> <?= date('d/m/Y', strtotime($userDetail['date_inscription'])) ?></p>
                    <p class="mb-0 small"><strong>Rôle :</strong> <?= $userDetail['role'] ?></p>
                <?php else: ?>
                    <p class="small text-muted">Cliquez sur "Voir" pour afficher le détail</p>
                <?php endif; ?>
            </div>

            <?php if ($userDetail): ?>
            <div class="d-flex gap-2 flex-wrap">
                <a href="?id=<?= $userDetail['id'] ?>&action=promouvoir" class="btn" style="background-color:#e8722a; color:white;">Promouvoir admin</a>
                <a href="?id=<?= $userDetail['id'] ?>&action=retrograder" class="btn" style="background-color:#e8722a; color:white;">Rétrograder</a>
                <a href="?id=<?= $userDetail['id'] ?>&action=supprimer" class="btn" style="background-color:#e8722a; color:white;" onclick="return confirm('Supprimer cet utilisateur ?')">Supprimer</a>
            </div>
            <?php endif; ?>
        </div>

    </div>
</div>

<?php require_once '../../includes/footer.php'; ?>