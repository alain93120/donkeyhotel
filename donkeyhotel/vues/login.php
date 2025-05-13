
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
    .login-container button, .login-container input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #007BFF;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .login-container button:hover, .login-container input[type="submit"]:hover {
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
    .error {
      color: red;
      font-size: 14px;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h1>DONKEY HÔTEL</h1>

    <?php if (!empty($message)): ?>
      <p class="error"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <form action="/index.php" method="post">
      <input type="email" name="email" placeholder="Email" required />
      <input type="password" name="password" placeholder="Mot de passe" required />
      <input type="submit" name="submit" value="Se connecter" />
    </form>

    <div class="signup-link">
      Vous n’avez pas de compte ? <a href="/register.php">Inscrivez-vous !</a>
    </div>
  </div>
</body>
</html>