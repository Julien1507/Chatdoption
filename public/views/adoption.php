<?php
require_once '../includes/header.php';
require_once '../../config/db.php';

// utilisateur connecté ?
if (!isset($_SESSION['user'])) {
    header("Location: " . BASE_URL . "/views/connexion.php");
    exit;
}
?>

<div class="container my-4">
    <h2 class="text-center py-2 mb-4" style="background-color: #4a3728; color: #d4a96a; border-radius: 4px;">Formulaire d'adoption</h2>

    <div class="row justify-content-center">
        <div class="col-12 col-lg-6">
            <div class="p-4" style="background-color: #3a2a1a; color: #d4a96a; border-radius: 4px;">
                <form method="POST" action="../../controllers/AdoptionController.php">

                    <!-- Id du chat passé depuis ficheChat.php -->
                    <input type="hidden" name="id_chat" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>">

                    <!-- 1 -->
                    <h5 style="color: #e8722a;">Situation</h5>
                    <div class="mb-3">
                        <label>Type de logement</label>
                        <input type="text" name="logement" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Propriétaire ?</label>
                        <input type="text" name="proprietaire" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Animaux autorisés ?</label>
                        <input type="text" name="animaux_autorises" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Extérieur ?</label>
                        <input type="text" name="exterieur" class="form-control">
                    </div>

                    <hr style="border-color: #d4a96a;">

                    <!-- 2 -->
                    <h5 style="color: #e8722a;">Foyer</h5>
                    <div class="mb-3">
                        <label>Enfants ?</label>
                        <input type="text" name="enfants" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Age des enfants</label>
                        <input type="text" name="age_enfants" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Autres animaux</label>
                        <input type="text" name="autres_animaux" class="form-control">
                    </div>

                    <hr style="border-color: #d4a96a;">

                    <!-- 3 -->
                    <h5 style="color: #e8722a;">Mode de vie</h5>
                    <div class="mb-3">
                        <label>Temps seul par jour</label>
                        <input type="text" name="temps_seul" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Travail</label>
                        <input type="text" name="travail" class="form-control">
                    </div>

                    <hr style="border-color: #d4a96a;">

                    <!-- 4 -->
                    <h5 style="color: #e8722a;">Motivation</h5>
                    <div class="mb-3">
                        <label>Pourquoi adopter ce chat ?</label>
                        <textarea name="message" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" name="engagement" id="engagement" required>
                        <label for="engagement">Je m'engage à m'occuper correctement de l'animal</label>
                    </div>

                    <div class="text-center mt-3">
                        <button type="submit" class="btn" style="background-color: #e8722a; color: white;">Envoyer</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>