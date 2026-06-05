<?php
require_once ROOT_PATH . '/public/includes/header.php';
?>

<div class="container my-4">
    <h2 class="text-center py-2 mb-4" style="background-color: #e8722a; color: white; border-radius: 4px;">Gestion des utilisateurs</h2>
    <a href="<?= BASE_URL ?>?url=admin" class="btn mb-3" style="background-color:#4a3728; color:#d4a96a;">← Dashboard</a>
    <div class="row">

        <!-- Gauche : filtre + tableau -->
        <div class="col-12 col-lg-7">

            <!-- Filtre -->
            <h5 class="text-center mb-3" style="color: #4a3728;">Filtres</h5>
            <form method="GET" action="<?= BASE_URL ?>?url=admin/users">
                <input type="hidden" name="url" value="admin/users">
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
                            <a href="<?= BASE_URL ?>?url=admin/users&id=<?= $u['id'] ?>" class="btn btn-sm" style="background-color:#4a3728; color:#d4a96a;">Voir</a>
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
                <a href="<?= BASE_URL ?>?url=admin/users&id=<?= $userDetail['id'] ?>&action=promouvoir" class="btn" style="background-color:#e8722a; color:white;">Promouvoir admin</a>
                <a href="<?= BASE_URL ?>?url=admin/users&id=<?= $userDetail['id'] ?>&action=retrograder" class="btn" style="background-color:#e8722a; color:white;">Rétrograder</a>
                <a href="<?= BASE_URL ?>?url=admin/users&id=<?= $userDetail['id'] ?>&action=supprimer" class="btn" style="background-color:#e8722a; color:white;" onclick="return confirm('Supprimer cet utilisateur ?')">Supprimer</a>
            </div>
            <?php endif; ?>
        </div>

    </div>
</div>

<?php require_once ROOT_PATH . '/public/includes/footer.php'; ?>