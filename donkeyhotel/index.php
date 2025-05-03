<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once './controlleur/HomeController.php';
require_once './modeles/user.php';

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=donkeyhotel;charset=utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$action = $_GET['action'] ?? 'login';

$controller = new HomeController($pdo);  

switch ($action) {
    case 'login':
        $controller->login(); 
        break;
    case 'search':
        require_once './controlleur/HotelController.php';
        $controller = new CityController();
        $controller->showCities();  
        break;
    case 'logout':
        require './vues/logout.php'; 
        break;
    default:
        echo "Page introuvable."; 
}
?>
