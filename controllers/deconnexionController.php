<?php

session_start();
require_once ROOT_PATH . '/config/db.php';
require_once ROOT_PATH . '/models/UserModel.php';
require_once ROOT_PATH . '/public/views/inscription.php';
session_destroy(); 
header("Location: " . BASE_URL . "/index.php");
exit;