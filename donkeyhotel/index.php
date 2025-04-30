<?php
require_once './controleurs/HomeController.php';
require_once './modeles/user.php';

$pdo = new PDO('mysql:host=localhost;dbname=donkeyhotel;charset=utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$controller = new HomeController($pdo);
$controller->login();
