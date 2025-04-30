<!DOCTYPE html>
<>
<link rel="stylesheet" href="assets/css/style.css">

<head>
    <title>Recherche d'Hôtels</title>
</head>
<body>
    <h1>Choisissez votre ville et vos horaires</h1>
    <form action="index.php?action=search" method="post">
        <label for="ville">Ville :</label>
        <input type="text" name="ville" id="ville" required><br><br>

        <label for="arrivee">Heure d'arrivée :</label>
        <input type="time" name="arrivee" id="arrivee" required><br><br>

        <label for="depart">Heure de départ :</label>
        <input type="time" name="depart" id="depart" required><br><br>

        <button type="submit">Valider</button>
    </form>
</body>

<form action="index.php?action=search" method="post">
    <label for="ville">Ville :</label>
    <input type="text" id="ville" name="ville" required>

    <label for="arrivee">Heure d'arrivée :</label>
    <input type="time" id="arrivee" name="arrivee" required>

    <label for="depart">Heure de départ :</label>
    <input type="time" id="depart" name="depart" required>

    <button type="submit">Valider</button>
</form>
