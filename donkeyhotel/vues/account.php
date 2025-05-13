<?php
session_start();
$message = $message ?? null;
include 'nav.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon compte - Donkey Hôtel</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<header>
    <h1>DONKEY HÔTEL</h1>
    <nav>
        <a href="?action=account">Mon compte</a>
        <a href="?action=reservation">Mes réservations</a>
        <a href="?action=search">Trouver un hôtel</a>
        <a href="?action=logout">Déconnexion</a>
    </nav>
</header>

<main>
    <h2>MON COMPTE</h2>

    <?php if ($message): ?>
        <p style="color: green"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <form method="POST" action="?action=account&sub=update">
        <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">

        <label>Civilité:
            <select name="civility">
                <option value="Mr" <?= $_SESSION['user']['civility'] === 'Mr' ? 'selected' : '' ?>>Mr</option>
                <option value="Mme" <?= $user['civility'] === 'Mme' ? 'selected' : '' ?>>Mme</option>
            </select>
        </label><br>

        <label>Prénom:
            <input type="text" name="firstname" value="<?= htmlspecialchars($_SESSION['user']['firstname']) ?>" required>
        </label><br>

        <label>Nom:
            <input type="text" name="lastname" value="<?= htmlspecialchars($_SESSION['user']['lastname']) ?>" required>
        </label><br>

        <label>Email:
            <input type="email" name="email" value="<?= htmlspecialchars($_SESSION['user']['email']) ?>" required>
        </label><br>


        <button type="submit">Modifier</button>
    </form>

    <form method="POST" action="?action=account&sub=delete" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer votre compte ?');">
        <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
        <button type="submit">Supprimer mon compte</button>
    </form>
</main>
</body>
</html>
