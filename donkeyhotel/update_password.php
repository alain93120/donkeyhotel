<?php
$newPassword = 'alain123';
$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

try {
    $pdo = new PDO('mysql:host=localhost;dbname=donkeyhotel', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("UPDATE user SET password = :password WHERE email = :email");
    $stmt->execute([':password' => $hashedPassword, ':email' => 'test@gmail.com']);

    echo "Mot de passe mis à jour avec succès !";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
