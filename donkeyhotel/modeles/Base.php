<?php
class Base {
    protected $pdo;

    public function __construct() {
        require(__DIR__ . '/../config/db.php');
        $this->pdo = new PDO('mysql:host='.HOST. ";port=" . PORT .';dbname='.DB, USER, PASS);
    }
}
?>
