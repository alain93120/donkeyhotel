<?php
require_once __DIR__ . '/../modeles/User.php';

class AccountController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function show() {
        require './vues/account.php';
    }

    public function getAccountInfo($userId): array {
        return $this->userModel->getUserById($userId);
    }
    

    public function updateAccount($userId, $firstname, $lastname, $email, $phone, $civility) {
        return $this->userModel->updateUser($userId, $firstname, $lastname, $email, $phone, $civility);
    }

    public function deleteAccount($userId) {
        return $this->userModel->deleteUser($userId);
    }

    public function changePassword($userId, $newPassword) {
        return $this->userModel->changePassword($userId, $newPassword);
    }
    
}
