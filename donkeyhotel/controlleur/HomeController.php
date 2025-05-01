<?php
require_once(__DIR__ . '/../modeles/user.php');

class HomeController {
    private $userModel;

    public function __construct($pdo) {
        $this->userModel = new User($pdo);
    }

    public function login() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $message = '';
    
        if (isset($_SESSION['user_id'])) {
            header('Location: dashboard.php');
            exit();
        }
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $password = $_POST['password'];
        
            // Récupérer l'utilisateur par son email
            $user = $this->userModel->findByEmail($email);
        
            if ($user) {
                // Afficher les valeurs pour déboguer
                echo 'Mot de passe saisi : ' . $password . '<br>';
                echo 'Mot de passe en base de données : ' . $user['password'] . '<br>';
        
                // Vérifier si le mot de passe correspond avec celui stocké
                if (password_verify($password, $user['password'])) {
                    echo "Mot de passe valide<br>";
                    $_SESSION['user_id'] = $user['id'];
                    header('Location: dashboard.php');
                    exit();
                } else {
                    echo "Mot de passe incorrect<br>";
                    $message = "Nom d'utilisateur ou mot de passe incorrect.";
                }
            } else {
                echo "Utilisateur non trouvé<br>";
                $message = "Utilisateur non trouvé.";
            }
        }
        

        require(__DIR__ . '/../vues/login.php');
    }
}
