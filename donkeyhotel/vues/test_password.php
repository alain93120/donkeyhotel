<?php
// Le mot de passe que tu veux tester
$inputPassword = 'alain123'; // Remplace par le mot de passe que tu souhaites tester

// Le mot de passe récupéré depuis la base de données (ici, c'est le hash)
$hashedPassword = "$2y$10$0PbZUJb2MUk3mp.zgjbfeu0alPY8V/66Z/6i5LUC/HspWXQ8GbwS6"; 

// Vérification du mot de passe
if (password_verify($inputPassword, $hashedPassword)) {
    echo "Mot de passe valide";
} else {
    echo "Mot de passe incorrect";
}

// Affiche le mot de passe saisi par l'utilisateur
var_dump($password); 

// Compare avec le mot de passe hashé dans la base de données
if (password_verify($password, $user['password'])) {
    echo "Mot de passe valide";
} else {
    echo "Mot de passe incorrect";
}

?>

