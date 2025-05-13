<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inscription - Donkey Hôtel</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>
    <h1>DONKEY HÔTEL</h1>

    <?php if (!empty($message)): ?>
        <div class="<?= $success ? 'success' : 'error' ?>">
            <p><?= htmlspecialchars($message) ?></p>
            <?php if ($success): ?>
                <p>Cliquez ici pour vous <a href="login.php">connecter</a></p>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <form action="/register.php" method="post">
        <input type="text" name="firstname" placeholder="Prénom" required>
        <input type="text" name="lastname" placeholder="Nom" required>
        <input type="email" name="email" placeholder="Entrer votre e-mail" required>
        <input type="password" name="password" placeholder="Votre mot de passe" required>
        <select name="civility" required>
            <option value="">Civilité</option>
            <option value="Mr">Monsieur</option>
            <option value="Mme">Madame</option>
        </select>
        <input type="submit" value="Valider">
    </form>
</body>
</html>
