<?php
session_start();
require_once 'C:/wamp64/www/LBD/Chatdoption/config/db.php';
require_once ROOT_PATH . '/models/UserModel.php';
session_destroy(); 
header("Location: " . BASE_URL . "/index.php");
exit;