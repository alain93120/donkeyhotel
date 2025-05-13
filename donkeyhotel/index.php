<?php

// require_once './controlleur/HomeController.php';
// $home =new HomeController();
// $home->login();

$page = $_GET['action'] ?? 'login'; // Valeur par défaut

switch ($page) {
    case 'reservation':
        require_once("./controlleur/ReservationController.php");
        $reservation = new ReservationController();
        break;
    case 'login':
            require_once("./controlleur/HomeController.php");
            $home =new HomeController();
            $home->login();
            break;
    case 'account':
        require_once("./controlleur/AccountController.php");
            $account =new AccountController();
            $account->show();
            break;
    case 'reservationDetail':
        require_once("./controlleur/ReservationDetailController.php");
            
    }