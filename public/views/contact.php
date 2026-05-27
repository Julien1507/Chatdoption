<?php
require_once 'C:/wamp64/www/LBD/Chatdoption/config/db.php';
require_once ROOT_PATH . '/public/includes/header.php';
?>

<div class="container my-4">
    <h2 class="text-center py-2 mb-4" style="background-color: #4a3728; color: #d4a96a; border-radius: 4px;">Contact</h2>

    <div class="row justify-content-center">
        <div class="col-12 col-lg-6">

            <div class="p-4 mb-4" style="background-color: #3a2a1a; color: #d4a96a; border-radius: 4px;">
                <h5 style="color: #e8722a;">Nous contacter</h5>
                <p class="mb-1">📧 contact@chadoption.be</p>
                <p class="mb-1">📞 04 123 456 789</p>
                <p class="mb-0">📍 Rue des Chats 15, 7500 Tournai</p>
            </div>

            <div class="p-4" style="background-color: #3a2a1a; color: #d4a96a; border-radius: 4px;">
                <h5 style="color: #e8722a;">Envoyer un message</h5>
                <form>
                    <div class="mb-3">
                        <label>Nom</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Message</label>
                        <textarea class="form-control" rows="4"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn" style="background-color:#e8722a; color:white;">Envoyer</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<?php require_once ROOT_PATH . '/public/includes/footer.php'; ?>