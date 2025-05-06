<?php
session_start();
require_once __DIR__ . '/../controlleur/AccountController.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php?action=login');
    exit();
}

$pdo = new PDO('mysql:host=localhost;dbname=donkeyhotel;charset=utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$accountController = new AccountController($pdo);
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($newPassword !== $confirmPassword) {
        $message = "Les mots de passe ne correspondent pas.";
    } elseif (strlen($newPassword) < 6) {
        $message = "Le mot de passe doit contenir au moins 6 caractères.";
    } else {
        if ($accountController->changePassword($_SESSION['user_id'], $newPassword)) {
            $message = "Mot de passe mis à jour avec succès.";
        } else {
            $message = "Une erreur est survenue.";
        }
    }
}
?>
