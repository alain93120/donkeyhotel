<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/controlleur/AccountController.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: account.php?subAction=update');
    exit();
}

$accountController = new AccountController();

$userId = $_SESSION['user_id'];
$user = $accountController->getAccountInfo($userId);
$message = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update'])) {
        $firstname = trim($_POST['firstname']);
        $lastname = trim($_POST['lastname']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $civility = trim($_POST['civility']);

        $message = $accountController->updateAccount($userId, $firstname, $lastname, $email, $phone, $civility);
        $user = $accountController->getAccountInfo($userId);
    }

    if (isset($_POST['delete'])) {
        $accountController->deleteAccount($userId);
        session_destroy();
        header('Location: index.php?action=login');
        exit();
    }
}


require_once __DIR__ . '/vues/account.php'; 
?>

