<?php
class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function register($email, $password, $firstname, $lastname) {
        if (empty($email) || empty($password) || empty($firstname) || empty($lastname)) {
            return "Tous les champs sont obligatoires.";
        }

        if ($this->emailExists($email)) {
            return "Cet email est déjà utilisé.";
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user (email, password, firstname, lastname) VALUES (:email, :password, :firstname, :lastname)";
        $stmt = $this->pdo->prepare($sql);
        
        try {
            $stmt->execute([
                ':email' => $email,
                ':password' => $hashedPassword,
                ':firstname' => $firstname,
                ':lastname' => $lastname
            ]);
            return "Inscription réussie !";
        } catch (PDOException $e) {
            return "Erreur d'inscription : " . $e->getMessage();
        }
    }

    public function emailExists($email) {
        $sql = "SELECT id FROM user WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':email' => $email]);
        return $stmt->rowCount() > 0; 
    }

    public function findByEmail($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE email = :email");
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function login($email, $password) {
        $user = $this->findByEmail($email);
    
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
    
        return false;
    }
}
?>
