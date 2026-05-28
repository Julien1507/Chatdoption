<?php 
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
                        <?php if (!empty($nomError)): ?>
                            <p class="small mt-1" style="color: #ff6b6b;"><?= $nomError ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label style="color: #e8722a;">Prénom</label>
                        <input type="text" name="prenom" class="form-control">
                        <?php if (!empty($prenomError)): ?>
                            <p class="small mt-1" style="color: #ff6b6b;"><?= $prenomError ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label style="color: #e8722a;">Email</label>
                        <input type="email" name="email" class="form-control">
                        <?php if (!empty($emailError)): ?>
                            <p class="small mt-1" style="color: #ff6b6b;"><?= $emailError ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label style="color: #e8722a;">Mot de passe</label>
                        <input type="password" name="mdp" class="form-control">
                        <?php if (!empty($mdpError)): ?>
                            <p class="small mt-1" style="color: #ff6b6b;"><?= $mdpError ?></p>
                        <?php endif; ?>
                        <input type="checkbox" name="ShowPassword" id="showPassword" class="form-check-input mt-2">
                        <label for="showPassword" style="color: #d4a96a;" class="form-check-label mt-2">Afficher le mot de passe</label>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn" style="background-color: #e8722a; color: white;">S'inscrire</button>
                    </div>
                </form>
            </div>
            <div class="mt-3 p-3" style="background-color: #3a2a1a; border-radius: 4px; color: #d4a96a;">
                <h6 style="color: #e8722a;">Conditions de création du compte</h6>
                <ul class="mb-0 ps-3">
                    <li>Nom et prénom : minimum 2 lettres</li>
                    <li>Email valide requis</li>
                    <li>Mot de passe : 6 caractères min, 1 majuscule, 1 chiffre</li>
                </ul>
            </div>
        </div>
    </div>
</div>


<!-- montrer mdp -->
<script>
    const showPasswordCheckbox = document.getElementById('showPassword');
    const passwordInput = document.querySelector('input[name="mdp"]');

    showPasswordCheckbox.addEventListener('change', function() {
        if (this.checked) {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    });
</script>
<?php require_once ROOT_PATH . '/public/includes/footer.php';?>