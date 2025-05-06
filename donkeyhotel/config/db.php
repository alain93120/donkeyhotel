<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

define('HOST', 'localhost');
define('PORT', '3306');
define('DB', 'donkeyhotel');
define('USER', 'root');
define('PASS', '');

$dsn = "mysql:host=" . HOST . ";port=" . PORT . ";dbname=" . DB . ";charset=utf8mb4";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, USER, PASS, $options);
} catch (PDOException $e) {
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}
