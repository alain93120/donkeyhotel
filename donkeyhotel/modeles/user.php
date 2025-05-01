<?php
class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function register($email, $password, $name, $lastname) {
        if (empty($email) || empty($password) || empty($name) || empty($lastname)) {
            return "Tous les champs sont obligatoires.";
        }

        if ($this->emailExists($email)) {
            return "Cet email est déjà utilisé.";
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (email, password, name, lastname) VALUES (:email, :password, :name, :lastname)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':email' => $email,
            ':password' => $hashedPassword,
            ':name' => $name,
            ':lastname' => $lastname
        ]);

        return "Inscription réussie !";
    }

    public function emailExists($email) {
        $sql = "SELECT id FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':email' => $email]);
        return $stmt->rowCount() > 0;
    }

    public function findByEmail($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
} 
?>
