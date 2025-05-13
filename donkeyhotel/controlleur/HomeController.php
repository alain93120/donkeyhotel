<?php
require_once __DIR__ . '/../modeles/user.php'; // recupere les fonction du model user
include './vues/login.php'; // Inclut la vue du formulaire de connexion

class HomeController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User(); 
    }

    public function login() {
        session_start(); 
        $message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;

            // Vérifie si les champs sont remplis
            if ($email && $password) {
                // Utilise la méthode de login dans ton modèle User
                $user = $this->userModel->login($email, $password);

                if ($user) {
                    // Connexion réussie, on crée une session
                    // $_SESSION['user_id'] = $user['id']; // Stocke l'id de l'utilisateur dans la session
                    $_SESSION['user'] = [
                        'id' => $user['id'],
                        'email' => $user['email'],
                        'civility' => $user['civility'],
                        'firstname' => $user['firstname'],
                        'lastname' => $user['lastname'],
                    ];
                    header('Location: /index.php?action=reservation'); // Redirige vers la page de compte
                    exit;
                } else {
                    $message = "Identifiants incorrects."; // Message d'erreur si les identifiants sont incorrects
                }
            } else {
                $message = "Veuillez remplir tous les champs."; // Message d'erreur si l'un des champs est vide
            }
        }

    }

    // Ajoute d'autres méthodes pour le contrôle des actions ici...
}



