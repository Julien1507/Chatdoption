<?php
$pdo = new PDO(
    'mysql:host=localhost;dbname=Chatdoption;charset=utf8',
    'root',
    '',
);

define('BASE_URL', 'http://lbd/Chatdoption/public');
define('CTRL_URL', 'http://lbd/Chatdoption/controllers');