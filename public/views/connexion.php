<?php 
require_once 'C:/wamp64/www/LBD/Chatdoption/config/db.php';
require_once ROOT_PATH . '/public/includes/header.php'; ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-5">
            <h2 class="text-center mb-4" style="color: #4a3728;">Connexion</h2>
            <div class="p-4" style="background-color: #4a3728; border-radius: 4px;">

                <!-- msg de confirmation et unset sert à supprimer le message après l'avoir affiché -->
                <?php if (isset($_SESSION['success'])): ?>
                    <p class="text-center mb-3" style="color: #e8722a;"><?= $_SESSION['success'] ?></p>
                <?php unset($_SESSION['success']); ?>
                <?php endif; ?>

                <form method="POST" action="../../controllers/connexionController.php">
                    <div class="mb-3">
                        <label style="color: #e8722a;">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label style="color: #e8722a;">Mot de passe</label>
                        <input type="password" name="mdp" class="form-control">
                    </div>

                    <?php if (!empty($error)): ?>
                        <p style="color: #ff6b6b;" class="small text-center"><?= $error ?></p>
                    <?php endif; ?>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn" style="background-color: #e8722a; color: white;">Se connecter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once ROOT_PATH . '/public/includes/footer.php'; ?>