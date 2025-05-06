<?php

include 'vues/nav.php';
function afficherDetailsReservation($reservation) {
    echo "<h2>Détails de votre réservation</h2>";
    echo "<p>Hôtel : " . htmlspecialchars($reservation['hotel']) . "</p>";
    echo "<p>Prix : " . htmlspecialchars($reservation['price']) . "€ / nuit</p>";

    if (!empty($reservation['options'])) {
        foreach ($reservation['options'] as $option) {
            echo "<p>" . htmlspecialchars($option['name']) . " : " . htmlspecialchars($option['price']) . "€";
            if (!empty($option['unit'])) echo "/" . htmlspecialchars($option['unit']);
            echo "</p>";
        }
    }

    echo "<h3>Infos client :</h3>";
    echo "<p>Prénom : " . htmlspecialchars($reservation['firstname']) . "</p>";
    echo "<p>Nom : " . htmlspecialchars($reservation['lastname']) . "</p>";
    echo "<p>Téléphone : " . htmlspecialchars($reservation['phone']) . "</p>";
    echo "<p><strong>TOTAL : " . htmlspecialchars($reservation['total']) . "€</strong></p>";
}

$reservation = [
    'hotel' => 'NIVEL HÔTEL',
    'price' => 200,
    'options' => [
        ['name' => 'Petit déjeuner', 'price' => 15],
        ['name' => 'Visite touristique', 'price' => 100, 'unit' => 'personne'],
        ['name' => 'Véhicule', 'price' => 20, 'unit' => 'jour']
    ],
    'firstname' => 'Dupont',
    'lastname' => 'Durant',
    'phone' => '06 22 22 22 22',
    'total' => 200
];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Détails Réservation - Donkey Hôtel</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <h1>DONKEY HÔTEL</h1>
    <?php afficherDetailsReservation($reservation); ?>
</body>
</html>
