<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Bienvenue sur votre tableau de bord !</h1>
    <p>Vous êtes connecté.</p>
    <a href="logout.php">Se déconnecter</a>
</body>
</html>
