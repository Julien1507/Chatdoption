<?php 
require_once 'C:/wamp64/www/LBD/Chatdoption/config/db.php';
require_once 'C:/wamp64/www/LBD/Chatdoption/public/includes/header.php'; ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-5">
            <h2 class="text-center mb-4" style="color: #4a3728;">Inscription</h2>
            <div class="p-4" style="background-color: #4a3728; border-radius: 4px;">
                <form method="POST" action="<?= CTRL_URL ?>/AuthController.php">
                    <div class="mb-3">
                        <label style="color: #e8722a;">Nom</label>
                        <input type="text" name="nom" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label style="color: #e8722a;">Prénom</label>
                        <input type="text" name="prenom" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label style="color: #e8722a;">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label style="color: #e8722a;">Mot de passe</label>
                        <input type="password" name="mdp" class="form-control">
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn" style="background-color: #e8722a; color: white;">S'inscrire</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once ROOT_PATH . '/public/includes/footer.php';?>