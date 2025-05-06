<?php
require_once __DIR__ . '/../controlleur/UserController.php';

$pdo = new PDO('mysql:host=localhost;dbname=donkeyhotel;charset=utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$userController = new UserController($pdo);
$message = '';

include 'vues/nav.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = trim($_POST['email']);
        $password = $_POST['password'];


        if ($userController->loginUser($email, $password)) {
            header('Location: dashboard.php');
            exit();
        } else {
            $message = "Mot de passe ou email incorrect.";
        }
}
?>
