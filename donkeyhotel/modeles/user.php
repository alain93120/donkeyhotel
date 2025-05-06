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

    public function findById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function updateUser($id, $firstname, $lastname, $email, $phone, $civility) {
        $sql = "UPDATE user SET firstname = :firstname, lastname = :lastname, email = :email, phone = :phone, civility = :civility WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':firstname' => $firstname,
            ':lastname' => $lastname,
            ':email' => $email,
            ':phone' => $phone,
            ':civility' => $civility,
            ':id' => $id
        ]);
    }
    
    public function deleteUser($id) {
        $sql = "DELETE FROM user WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
    
    public function changePassword($userId, $newPassword) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $sql = "UPDATE user SET password = :password WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':password' => $hashedPassword,
            ':id' => $userId
        ]);
    }
    
}
?>
