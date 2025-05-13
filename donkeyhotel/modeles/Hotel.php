<?php

class Hotel {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function readAll(): array {
        $stmt = $this->pdo->query("SELECT * FROM hotel");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
