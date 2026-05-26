<?php
require_once 'C:/wamp64/www/LBD/Chatdoption/config/db.php';
require_once ROOT_PATH . '/public/includes/header.php';
?>

<div class="container my-4">
    <h2 class="text-center py-2 mb-4" style="background-color: #4a3728; color: #d4a96a; border-radius: 4px;">Mon profil</h2>

    <?php if ($success): ?>
        <p class="text-center" style="color: #4caf50;"><?= $success ?></p>
    <?php endif; ?>
    <?php if ($error): ?>
        <p class="text-center" style="color: #f44336;"><?= $error ?></p>
    <?php endif; ?>

    <div class="row justify-content-center gap-4">

        <!-- Infos -->
        <div class="col-12 col-lg-5">
            <div class="p-4" style="background-color: #3a2a1a; color: #d4a96a; border-radius: 4px;">
                <h5 style="color: #e8722a;">Mes informations</h5>
                <form method="POST" action="">
                    <div class="mb-3">
                        <label>Nom</label>
                        <input type="text" name="nom" class="form-control" value="<?= $user['nom'] ?>">
                    </div>
                    <div class="mb-3">
                        <label>Prénom</label>
                        <input type="text" name="prenom" class="form-control" value="<?= $user['prenom'] ?>">
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?= $user['email'] ?>">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn" style="background-color:#e8722a; color:white;">Mettre à jour</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Mot de passe -->
        <div class="col-12 col-lg-5">
            <div class="p-4" style="background-color: #3a2a1a; color: #d4a96a; border-radius: 4px;">
                <h5 style="color: #e8722a;">Changer mon mot de passe</h5>
                <form method="POST" action="">
                    <div class="mb-3">
                        <label>Nouveau mot de passe</label>
                        <input type="password" name="mdp" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Confirmer le mot de passe</label>
                        <input type="password" name="mdp_confirm" class="form-control">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn" style="background-color:#e8722a; color:white;">Changer</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<?php require_once ROOT_PATH . '/public/includes/footer.php'; ?>