<?php

class HomeController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function login() {
        include './vues/login.php';
    }
}
