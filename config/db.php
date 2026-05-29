<?php
$pdo = new PDO(
    'mysql:host=localhost;dbname=Chatdoption;charset=utf8',
    'root',
    '',
);

define('ROOT_PATH', dirname(__DIR__));
define('BASE_URL', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));