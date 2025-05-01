<?php
$newPassword = 'alain123'; // Nouveau mot de passe que tu veux utiliser
$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

// Connexion à la base de données (assure-toi que les paramètres sont corrects)
try {
    $pdo = new PDO('mysql:host=localhost;dbname=donkeyhotel', 'root', ''); // Adapte la connexion à ta base
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Préparation de la requête pour mettre à jour le mot de passe
    $stmt = $pdo->prepare("UPDATE users SET password = :password WHERE email = :email");
    $stmt->execute([':password' => $hashedPassword, ':email' => 'test@gmail.com']);

    echo "Mot de passe mis à jour avec succès !";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
