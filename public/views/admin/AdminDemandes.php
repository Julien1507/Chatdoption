<?php require_once ROOT_PATH . '/public/includes/header.php'; ?>

<div class="container my-4">
    <h2 class="text-center py-2 mb-4" style="background-color: #4a3728; color: #d4a96a; border-radius: 4px;">Gestion des demandes</h2>

    <div class="row">
        <!-- Gauche -->
        <div class="col-12 col-lg-7">

            <!-- Filtres -->
            <h5 class="text-center mb-3" style="color: #4a3728;">Filtres</h5>
            <form method="GET" action="">
                <div class="p-3 mb-4" style="background-color: #4a3728; border-radius: 4px;">
                    <div class="row g-2">
                        <div class="col-12 d-flex align-items-center gap-2">
                            <label style="color:#e8722a; white-space:nowrap;">Recherche</label>
                            <input type="text" name="recherche" class="form-control" value="<?= $recherche ?>">
                        </div>
                        <div class="col-12 d-flex align-items-center gap-2">
                            <label style="color:#e8722a; white-space:nowrap;">Statut</label>
                            <select name="statut" class="form-control">
                                <option value="">Tous</option>
                                <option value="en_attente" <?= $statut == 'en_attente' ? 'selected' : '' ?>>En attente</option>
                                <option value="accepte"    <?= $statut == 'accepte'    ? 'selected' : '' ?>>Accepté</option>
                                <option value="refuse"     <?= $statut == 'refuse'     ? 'selected' : '' ?>>Refusé</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn w-100" style="background-color:#e8722a; color:white;">Filtrer</button>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Tableau -->
            <table class="table table-bordered text-center small">
                <thead style="background-color: #4a3728; color: #d4a96a;">
                    <tr>
                        <th>Utilisateur</th>
                        <th>Chat</th>
                        <th>Date</th>
                        <th>Statut</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($demandes as $d): ?>
                    <tr>
                        <td><?= $d['prenom'] ?> <?= $d['nom'] ?></td>
                        <td><?= $d['nom_chat'] ?></td>
                        <td><?= date('d/m/Y', strtotime($d['date_demande'])) ?></td>
                        <td>
                            <?php if ($d['statut'] == 'en_attente'): ?>
                                <span style="color:#e8722a;">En attente</span>
                            <?php elseif ($d['statut'] == 'accepte'): ?>
                                <span style="color:#4caf50;">Accepté</span>
                            <?php else: ?>
                                <span style="color:#f44336;">Refusé</span>
                            <?php endif; ?>
                        </td>
                        <td><a href="?id=<?= $d['id'] ?>" class="btn btn-sm" style="background-color:#4a3728; color:#d4a96a;">Voir</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Droite : détail -->
        <div class="col-12 col-lg-4 offset-lg-1">
            <h5 class="text-center py-2 mb-3" style="background-color: #4a3728; color: #d4a96a; border-radius: 4px;">Détails de la demande</h5>

            <?php if ($demandeDetail): ?>
            <div class="p-3 mb-3" style="border: 1px solid #4a3728; border-radius: 4px; font-size: 0.85rem;">
                <p class="mb-1"><strong>Infos utilisateur</strong></p>
                <p class="mb-0">Nom / prénom : <?= $demandeDetail['prenom'] ?> <?= $demandeDetail['nom'] ?></p>
                <p class="mb-0">Email : <?= $demandeDetail['email'] ?></p>
                <p class="mb-3">Téléphone : —</p>

                <p class="mb-1"><strong>Chat demandé</strong></p>
                <p class="mb-3">Photo + nom + âge : <?= $demandeDetail['nom_chat'] ?>, <?= $demandeDetail['age_chat'] ?> ans</p>

                <!-- Extraction du message -->
                <?php
                $msg = $demandeDetail['message'];
                $parties = explode(' | ', $msg);
                foreach ($parties as $partie) {
                    echo '<p class="mb-0 small">' . htmlspecialchars($partie) . '</p>';
                }
                ?>
            </div>

            <div class="d-flex gap-2">
                <a href="?id=<?= $demandeDetail['id'] ?>&action=accepter" class="btn w-100" style="background-color:#e8722a; color:white;" onclick="return confirm('Accepter cette demande ?')">Accepter</a>
                <a href="?id=<?= $demandeDetail['id'] ?>&action=refuser" class="btn w-100" style="background-color:#4a3728; color:#d4a96a;" onclick="return confirm('Refuser cette demande ?')">Refuser</a>
            </div>

            <?php else: ?>
            <p class="small text-muted">Cliquez sur "Voir" pour afficher le détail</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require_once ROOT_PATH . '/public/includes/footer.php'; ?>