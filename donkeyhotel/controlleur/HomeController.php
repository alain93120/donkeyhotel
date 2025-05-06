
<?php

class HomeController {
    private $pdo;
    private $userModel;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->userModel = new User($pdo); 
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;

            if ($email && $password) {
                $user = $this->userModel->login($email, $password);

                if ($user) {
                    session_start();
                    $_SESSION['user_id'] = $user['id'];
                    header('Location: account.php'); 
                    exit;
                } else {
                    $message = "Identifiants incorrects.";
                }
            } else {
                $message = "Veuillez remplir tous les champs.";
            }
        }

        include './vues/login.php'; 
    }
}
