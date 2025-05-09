<?php
require_once(__DIR__ . '/../modeles/user.php');

class AuthController {
    private $userModel;

    public function __construct($pdo) {
        $this->userModel = new User($pdo);
    }

    public function login() {
        session_start();
        $message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            $user = $this->userModel->findByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                header('Location: index123.php');
                exit();
            } else {
                $message = "Nom d'utilisateur ou mot de passe incorrect.";
            }
        }

        require(__DIR__ . '/../vues/login.php');
    }
}
?>
