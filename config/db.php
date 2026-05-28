<?php
$pdo = new PDO(
    'mysql:host=localhost;dbname=Chatdoption;charset=utf8',
    'root',
    '',
);

// Chemin absolu vers la racine du projet (fonctionne sur toutes les machines)
define('ROOT_PATH', dirname(__DIR__));

// URL de base dynamique (fonctionne sur tous les serveurs)
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$host     = $_SERVER['HTTP_HOST'];
$base     = rtrim(dirname(dirname($_SERVER['SCRIPT_NAME'])), '/');
define('BASE_URL', $protocol . '://' . $host . $base . '/public');
define('CTRL_URL', $protocol . '://' . $host . $base . '/controllers');