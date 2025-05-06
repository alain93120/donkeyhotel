<?php
include 'nav.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Changer le mot de passe</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<header>
    <h1>DONKEY HÔTEL</h1>
    <nav>
        <a href="account.php">Mon compte</a>
        <a href="dashboard.php">Accueil</a>
        <a href="../logout.php">Déconnexion</a>
    </nav>
</header>

<main>
    <h2>Changer de mot de passe</h2>

    <?php if ($message): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <form method="POST">
        <label>Nouveau mot de passe :
            <input type="password" name="new_password" required>
        </label><br>

        <label>Confirmer le mot de passe :
            <input type="password" name="confirm_password" required>
        </label><br>

        <button type="submit">Valider</button>
    </form>
</main>
</body>
</html>
