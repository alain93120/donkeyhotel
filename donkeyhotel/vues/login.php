


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../assets/style.css">
  <title>Connexion - DONKEY HÔTEL</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .login-container {
      background-color: white;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      width: 300px;
      text-align: center;
    }

    .login-container h1 {
      margin-bottom: 30px;
    }

    .login-container input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .login-container button {
      width: 100%;
      padding: 10px;
      background-color: #007BFF;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .login-container button:hover {
      background-color: #0056b3;
    }

    .signup-link {
      margin-top: 15px;
      display: block;
      font-size: 14px;
    }

    .signup-link a {
      color: #007BFF;
      text-decoration: none;
    }

    .signup-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
<?php if ($message): ?>
  <div class="error"><p>❌ <?= htmlspecialchars($message) ?></p></div>
<?php endif; ?>

  <div class="login-container">
    <h1>DONKEY HÔTEL</h1>
    <form action="" method="post">
    <input type="email" class="box-input" name="email" placeholder="Email" required />
  <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
  <input type="submit" name="submit" value="Se connecter" class="box-button" />
    </form>
    <div class="signup-link">
      Vous n’avez pas de compte ? <a href="register.php">Inscrivez-vous !</a>
    </div>
  </div>

</body>
</html>
