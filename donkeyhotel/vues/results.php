<!DOCTYPE html>
<html>
<link rel="stylesheet" href="assets/css/style.css">

<head>
    <title>Résultats</title>
</head>
<body>
    <h1>Résultats de votre recherche</h1>
    <?php if (!empty($resultats)): ?>
        <ul>
            <?php foreach ($resultats as $hotel): ?>
                <li><?php echo $hotel['ville'] . " — " . $hotel['nom']; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucun hôtel trouvé pour la ville choisie.</p>
    <?php endif; ?>

    <a href="index.php">Retour à la recherche</a>
</body>
</html>
