<?php
require_once __DIR__ . '/../../config/db.php';
require_once ROOT_PATH . '/public/includes/header.php';
?>

<div class="container my-4">
    <h2 class="text-center py-2 mb-4" style="background-color: #4a3728; color: #d4a96a; border-radius: 4px;">Formulaire d'adoption</h2>

    <div class="row justify-content-center">
        <div class="col-12 col-lg-6">
            <div class="p-4" style="background-color: #3a2a1a; color: #d4a96a; border-radius: 4px;">

                <!-- Barre de progression -->
                <div class="d-flex gap-2 mb-4">
                    <div class="barre active" id="b1" style="height:4px; flex:1; background:#e8722a; border-radius:4px;"></div>
                    <div class="barre" id="b2" style="height:4px; flex:1; background:#5a4a3a; border-radius:4px;"></div>
                    <div class="barre" id="b3" style="height:4px; flex:1; background:#5a4a3a; border-radius:4px;"></div>
                    <div class="barre" id="b4" style="height:4px; flex:1; background:#5a4a3a; border-radius:4px;"></div>
                </div>

                <form method="POST" action="<?= CTRL_URL ?>/AdoptionController.php">
                    <input type="hidden" name="id_chat" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>">

                    <!-- ÉTAPE 1 : Situation -->
                    <div class="etape" id="etape1">
                        <p style="color:#e8722a;">1/4 — Situation</p>
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
                        <div class="text-center">
                            <button type="button" class="btn" style="background-color:#e8722a; color:white;" onclick="suivant(2)">Suivant</button>
                        </div>
                    </div>

                    <!-- ÉTAPE 2 : Foyer -->
                    <div class="etape" id="etape2" style="display:none;">
                        <p style="color:#e8722a;">2/4 — Foyer</p>
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
                        <div class="d-flex gap-2 justify-content-center">
                            <button type="button" class="btn" style="background-color:#5a4a3a; color:white;" onclick="suivant(1)">Précédent</button>
                            <button type="button" class="btn" style="background-color:#e8722a; color:white;" onclick="suivant(3)">Suivant</button>
                        </div>
                    </div>

                    <!-- ÉTAPE 3 : Mode de vie -->
                    <div class="etape" id="etape3" style="display:none;">
                        <p style="color:#e8722a;">3/4 — Mode de vie</p>
                        <div class="mb-3">
                            <label>Temps seul par jour</label>
                            <input type="text" name="temps_seul" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Travail</label>
                            <input type="text" name="travail" class="form-control">
                        </div>
                        <div class="d-flex gap-2 justify-content-center">
                            <button type="button" class="btn" style="background-color:#5a4a3a; color:white;" onclick="suivant(2)">Précédent</button>
                            <button type="button" class="btn" style="background-color:#e8722a; color:white;" onclick="suivant(4)">Suivant</button>
                        </div>
                    </div>

                    <!-- ÉTAPE 4 : Motivation -->
                    <div class="etape" id="etape4" style="display:none;">
                        <p style="color:#e8722a;">4/4 — Motivation</p>
                        <div class="mb-3">
                            <label>Pourquoi adopter ce chat ?</label>
                            <textarea name="message" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <input type="checkbox" name="engagement" id="engagement" required>
                            <label for="engagement">Je m'engage à m'occuper correctement de l'animal</label>
                        </div>
                        <div class="d-flex gap-2 justify-content-center">
                            <button type="button" class="btn" style="background-color:#5a4a3a; color:white;" onclick="suivant(3)">Précédent</button>
                            <button type="submit" class="btn" style="background-color:#e8722a; color:white;">Envoyer</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
function suivant(etape) {
    // Cache toutes les étapes
    document.querySelectorAll('.etape').forEach(e => e.style.display = 'none');
    // Affiche la bonne étape
    document.getElementById('etape' + etape).style.display = 'block';
    // Met à jour la barre de progression
    for (let i = 1; i <= 4; i++) {
        document.getElementById('b' + i).style.background = i <= etape ? '#e8722a' : '#5a4a3a';
    }
}
</script>

<?php require_once ROOT_PATH . '/public/includes/footer.php'; ?>