<?php
$message = $message ?? null;
include 'nav.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mon compte - Donkey Hôtel</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<header>
    <h1>DONKEY HÔTEL</h1>
    <nav>
        <a href="account.php">Mon compte</a>
        <a href="reservations.php">Mes réservations</a>
        <a href="dashboard.php">Trouver un hôtel</a>
        <a href="../logout.php">Déconnexion</a>
    </nav>
</header>
<main>
    <h2>MON COMPTE</h2>

    <?php if ($message): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <form method="POST">
        <label>Civilité:
            <select name="civility">
                <option value="Mr" <?= $user['civility'] === 'Mr' ? 'selected' : '' ?>>Mr</option>
                <option value="Mme" <?= $user['civility'] === 'Mme' ? 'selected' : '' ?>>Mme</option>
            </select>
        </label><br>

        <label>Prénom:
            <input type="text" name="firstname" value="<?= htmlspecialchars($user['firstname']) ?>" required>
        </label><br>

        <label>Nom:
            <input type="text" name="lastname" value="<?= htmlspecialchars($user['lastname']) ?>" required>
        </label><br>

        <label>Email:
            <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
        </label><br>

        <label>Téléphone:
            <input type="text" name="phone" value="<?= htmlspecialchars($user['phone']) ?>">
        </label><br>

        <button type="submit" name="update">Modifier</button>
        <button type="submit" name="delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer votre compte ?');">Supprimer mon compte</button>
    </form>
</main>
</body>
</html>
