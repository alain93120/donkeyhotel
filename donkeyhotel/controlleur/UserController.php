<?php
require_once __DIR__ . '/../modeles/user.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function registerUser($email, $password, $firstname, $lastname) {
        return $this->userModel->register($email, $password, $firstname, $lastname);
    }

    public function loginUser($email, $password) {
        $user = $this->userModel->login($email, $password);
        if ($user) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            return true;
        }
        return false;
    }

    public function getUserByEmail($email) {
        return $this->userModel->findByEmail($email);
    }

    // public function show(){
        
    //     //  $pdo = new PDO('mysql:host=localhost;dbname=donkeyhotel;charset=utf8', 'root', '');
    //     //  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    //     //  $userController = new UserController();
    //     //  $message = '';
        
        
    //      if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['firstname'], $_POST['email'], $_POST['password'])) {
    //          $firstname = trim($_POST['firstname']);
    //          $lastname = trim($_POST['lastname']);
    //          $email = trim($_POST['email']);
    //          $password = $_POST['password'];
    //          $civility = $_POST['civility'] ?? '';

    //          $userObjet = new User();
    //          $message = $userObjet->register($email, $password, $firstname, $lastname);
        
    //          if (strpos($message, 'réussie') !== false) {
    //              $success = true;
    //              header('Location: /index.php');
    //          } else {
    //              $success = false;
    //          }
    //      }
    

    //     include_once __DIR__ .'/../vues/register.php';
    // }
}





