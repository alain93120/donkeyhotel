<?php
session_start();
require_once __DIR__ . '/../controlleur/AccountController.php';

$pdo = new PDO('mysql:host=localhost;dbname=donkeyhotel;charset=utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$accountController = new AccountController($pdo);

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php?action=login');
    exit();
}

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
?>




