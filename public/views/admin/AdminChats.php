<?php 
require_once ROOT_PATH . '/public/includes/header.php'; ?>

<div class="container my-4">
    <h2 class="text-center py-2 mb-4" style="background-color: #e8722a; color: white; border-radius: 4px;">Gestion des chats</h2>
    <a href="<?= BASE_URL ?>?url=admin" class="btn mb-3" style="background-color:#4a3728; color:#d4a96a;">← Dashboard</a>
    <div class="row">
        <!-- Gauche -->
        <div class="col-12 col-lg-7">

            <!-- Ajouter un chat -->
            <h5 class="text-center mb-3" style="color: #4a3728;">Ajouter un chat</h5>
            <form method="POST" action="<?= BASE_URL ?>?url=admin/chats">
                <table class="table table-bordered text-center small mb-4">
                    <thead style="background-color: #4a3728; color: #d4a96a;">
                        <tr><th>Nom</th><th>Âge</th><th>Sexe</th><th>Date arrivée</th><th>Description</th><th>Action</th></tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" name="nom" class="form-control form-control-sm"></td>
                            <td><input type="number" name="age" class="form-control form-control-sm"></td>
                            <td>
                                <select name="sexe" class="form-control form-control-sm">
                                    <option value="male">Mâle</option>
                                    <option value="femelle">Femelle</option>
                                </select>
                            </td>
                            <td><input type="date" name="date_arrivee" class="form-control form-control-sm"></td>
                            <td><input type="text" name="description" class="form-control form-control-sm"></td>
                            <td>
                                <input type="hidden" name="race" value="">
                                <input type="hidden" name="statut" value="disponible">
                                <input type="hidden" name="image" value="default.jpg">
                                <button type="submit" name="ajouter" class="btn btn-sm" style="background-color:#e8722a; color:white;">Ajouter</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>

            <!-- Filtres -->
            <h5 class="text-center mb-3" style="color: #4a3728;">Filtres</h5>
            <form method="GET" action="<?= BASE_URL ?>?url=admin/chats">
                <div class="p-3 mb-4" style="background-color: #4a3728; border-radius: 4px;">
                    <div class="row g-2">
                        <div class="col-12 d-flex align-items-center gap-2">
                            <label style="color:#e8722a; white-space:nowrap;">Recherche</label>
                            <input type="text" name="recherche" class="form-control" value="<?= $recherche ?>">
                        </div>
                        <div class="col-6 d-flex align-items-center gap-2">
                            <label style="color:#e8722a; white-space:nowrap;">Statut</label>
                            <select name="statut" class="form-control">
                                <option value="">Tous</option>
                                <option value="disponible" <?= $statut == 'disponible' ? 'selected' : '' ?>>Disponible</option>
                                <option value="adopte" <?= $statut == 'adopte' ? 'selected' : '' ?>>Adopté</option>
                            </select>
                        </div>
                        <div class="col-6 d-flex align-items-center gap-2">
                            <label style="color:#e8722a; white-space:nowrap;">Sexe</label>
                            <select name="sexe" class="form-control">
                                <option value="">Tous</option>
                                <option value="male" <?= $sexe == 'male' ? 'selected' : '' ?>>Mâle</option>
                                <option value="femelle" <?= $sexe == 'femelle' ? 'selected' : '' ?>>Femelle</option>
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
                    <tr><th>Nom</th><th>Sexe</th><th>Âge</th><th>Race</th><th>Date arrivée</th><th>Description</th><th>Statut</th><th>Action</th></tr>
                </thead>
                <tbody>
                    <?php foreach($chats as $c): ?>
                    <tr>
                        <td><?= $c['nom'] ?></td>
                        <td><?= $c['sexe'] ?></td>
                        <td><?= $c['age'] ?></td>
                        <td><?= $c['race'] ?></td>
                        <td><?= $c['date_arrivee'] ?></td>
                        <td><?= substr($c['description'], 0, 20) ?>...</td>
                        <td><?= $c['statut'] ?></td>
                        <td><a href="<?= BASE_URL ?>?url=admin/chats&id=<?= $c['id'] ?>" class="btn btn-sm" style="background-color:#4a3728; color:#d4a96a;">Voir</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Droite : fiche -->
        <div class="col-12 col-lg-4 offset-lg-1">
            <h5 class="text-center mb-3" style="color: #4a3728;">Fiche</h5>

            <?php if ($chatDetail): ?>
            <div class="p-3 mb-3" style="border: 1px solid #4a3728; border-radius: 4px;">
                <p class="small mb-1"><strong>Nom :</strong> <?= $chatDetail['nom'] ?></p>
                <p class="small mb-1"><strong>Âge :</strong> <?= $chatDetail['age'] ?></p>
                <p class="small mb-1"><strong>Sexe :</strong> <?= $chatDetail['sexe'] ?></p>
                <p class="small mb-1"><strong>Race :</strong> <?= $chatDetail['race'] ?></p>
                <p class="small mb-1"><strong>Statut :</strong> <?= $chatDetail['statut'] ?></p>
                <img src="<?= BASE_URL ?>/images/<?= $chatDetail['image'] ?>" style="width:100%; height:120px; object-fit:cover; border-radius:4px;" class="mt-2">
                <p class="small mt-2"><?= $chatDetail['description'] ?></p>
            </div>

            <div class="d-flex gap-2 flex-wrap">
                <!-- Modifier -->
                <button class="btn" style="background-color:#e8722a; color:white;" onclick="document.getElementById('formModifier').style.display='block'">Modifier</button>
                <!-- Supprimer -->
                <a href="<?= BASE_URL ?>?url=admin/chats&id=<?= $chatDetail['id'] ?>&action=supprimer" class="btn" style="background-color:#e8722a; color:white;" onclick="return confirm('Supprimer ?')">Supprimer</a>
                <!-- Changer statut -->
                <a href="<?= BASE_URL ?>?url=admin/chats&id=<?= $chatDetail['id'] ?>&action=statut&statut=...">" class="btn" style="background-color:#e8722a; color:white;">
                    <?= $chatDetail['statut'] == 'disponible' ? 'Marquer adopté' : 'Marquer disponible' ?>
                </a>
            </div>

            <!-- Formulaire modifier (caché par défaut) -->
            <form id="formModifier" method="POST" action="<?= BASE_URL ?>?url=admin/chats" style="display:none;" class="mt-3">
                <input type="hidden" name="id" value="<?= $chatDetail['id'] ?>">
                <div class="mb-2"><input type="text" name="nom" class="form-control form-control-sm" value="<?= $chatDetail['nom'] ?>" placeholder="Nom"></div>
                <div class="mb-2"><input type="number" name="age" class="form-control form-control-sm" value="<?= $chatDetail['age'] ?>" placeholder="Âge"></div>
                <div class="mb-2">
                    <select name="sexe" class="form-control form-control-sm">
                        <option value="male" <?= $chatDetail['sexe'] == 'male' ? 'selected' : '' ?>>Mâle</option>
                        <option value="femelle" <?= $chatDetail['sexe'] == 'femelle' ? 'selected' : '' ?>>Femelle</option>
                    </select>
                </div>
                <div class="mb-2"><input type="text" name="race" class="form-control form-control-sm" value="<?= $chatDetail['race'] ?>" placeholder="Race"></div>
                <div class="mb-2"><input type="text" name="image" class="form-control form-control-sm" value="<?= $chatDetail['image'] ?>" placeholder="Image"></div>
                <div class="mb-2"><textarea name="description" class="form-control form-control-sm" rows="2"><?= $chatDetail['description'] ?></textarea></div>
                <button type="submit" name="modifier" class="btn w-100" style="background-color:#e8722a; color:white;">Enregistrer</button>
            </form>

            <?php else: ?>
            <p class="small text-muted">Cliquez sur "Voir" pour afficher la fiche</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require_once ROOT_PATH . '/public/includes/footer.php'; ?>