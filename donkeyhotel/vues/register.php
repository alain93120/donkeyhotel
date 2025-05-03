<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<?php

require_once '../controlleur/UserController.php'; 

$pdo = new PDO('mysql:host=localhost;dbname=donkeyhotel;charset=utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$userController = new UserController($pdo);
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['firstname'], $_POST['email'], $_POST['password'])) {
  
  $firstname = trim($_POST['firstname']);
  $lastname = trim($_POST['lastname']);
  $email = trim($_POST['email']);
  $password = $_POST['password'];

  $message = $userController->registerUser($email, $password, $firstname, $lastname);

  if (strpos($message, 'réussie') !== false) {
    echo "<div class='success'>
            <h3>✅ $message</h3>
            <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
          </div>";
} else {
    echo "<div class='error'><p>❌ $message</p></div>";
}
}
  
?>

<form class="box" action="" method="post">
  <h1 class="box-title">S'inscrire</h1>
  <input type="text" class="box-input" name="firstname" placeholder="Prénom" required />
  <input type="text" class="box-input" name="lastname" placeholder="Nom" required />
  <input type="email" class="box-input" name="email" placeholder="Email" required />
  <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
  <input type="submit" name="submit" value="S'inscrire" class="box-button" />
  <p class="box-register">Déjà inscrit ? <a href="login.php">Connectez-vous ici</a></p>
</form>

</body>
</html>
