<?php
require_once './controleurs/HomeController.php';
require_once './modeles/user.php';

$pdo = new PDO('mysql:host=localhost;dbname=donkeyhotel;charset=utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$controller = new HomeController($pdo);
$controller->login();

$action = $_GET['action'] ?? 'login';

switch ($action) {
    case 'login':
        $controller = new HomeController($pdo);
        $controller->login();
        break;
    case 'search':
        require_once './controlleur/CityController.php';
        $controller = new CityController();
        $controller->showCities();
        break;
    case 'logout':
        require './vues/logout.php';
        break;
    default:
        echo "Page introuvable.";
}
