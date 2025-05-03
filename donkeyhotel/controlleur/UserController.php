<?php
require_once __DIR__ . '/../modeles/user.php';

class UserController {
    private $userModel;

    public function __construct($pdo) {
        $this->userModel = new User($pdo);
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
}
?>
