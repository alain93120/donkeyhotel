<?php

$inputPassword = 'alain123';
$user = [
    'password' => '$2y$10$0PbZUJb2MUk3mp.zgjbfeu0alPY8V/66Z/6i5LUC/HspWXQ8GbwS6'
];

if (password_verify($inputPassword, $user['password'])) {
    echo "Mot de passe valide";
} else {
    echo "Mot de passe incorrect";
}
?>
