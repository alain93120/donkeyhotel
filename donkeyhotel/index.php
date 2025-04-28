<?php
require_once './controlleur/authController.php';
require_once './modeles/user.php';
$pdo = new PDO('mysql:host=localhost;dbname=donkeyhotel;charset=utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$controller = new AuthController($pdo);
$controller->login();
?>
