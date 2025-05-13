<?php
require_once (__DIR__ . '/../config/db.php');
class Base {
    protected $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO('mysql:host='.HOST. ";port=" . PORT .';dbname='.DB, USER, PASS);
        
            //echo "Inscription réussie !";

        } catch (PDOException $e) {
            echo "Erreur d'inscription : " . $e->getMessage();
        }
    }
       
}

new Base();


