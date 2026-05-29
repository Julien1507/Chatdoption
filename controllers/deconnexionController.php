<?php
session_start();
require_once __DIR__ . '/../config/db.php';
require_once ROOT_PATH . '/models/UserModel.php';
session_destroy(); 
header("Location: " . BASE_URL . "?url=accueil");
exit;