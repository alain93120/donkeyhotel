<?php
$pdo = new PDO("mysql:host=localhost;dbname=donkeyhotel;charset=utf8", "root", "");

// Récupère toutes les villes distinctes depuis la table hotel
$stmt = $pdo->query("SELECT DISTINCT city FROM hotel");
$villes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes Réservations - Donkey Hôtel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffe0b2;
            margin: 0;
            padding: 20px;
        }

        h1, h2 {
            text-align: center;
            color: #e65100;
        }

        table {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            vertical-align: middle;
        }

        th {
            background-color: #ff9800;
            color: white;
        }

        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            font-weight: bold;
            margin-top: 8px;
        }

        .btn-edit {
            background-color: #4caf50;
        }

        .btn-cancel {
            background-color: #f44336;
        }

        .actions {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .actions form {
            margin: 5px;
        }

        input[type="date"],
        select {
            margin-top: 8px;
            padding: 6px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
    </style>
</head>
<body>

<h1>DONKEY HÔTEL</h1>
<h2>MES RÉSERVATIONS</h2>

<table>
    <tr>
        <th>Ville</th>
        <th>Arrivé / Retour</th>
        <th>Actions</th>
    </tr>

    <tr>
        <td>
            <form method="post" action="change_city.php">
                <select name="ville">
                <?php foreach ($villes as $ville): ?>
                    <option value="<?= htmlspecialchars($ville['city']) ?>"><?= htmlspecialchars($ville['city']) ?></option>
                <?php endforeach; ?>
            </select>

                <button type="submit" class="btn btn-edit">Valider</button>
            </form>
        </td>
        <td>
            <form method="post" action="modifier_dates.php">
                <input type="date" name="date_arrivee">
                <input type="date" name="date_retour">
                <button type="submit" class="btn btn-edit">Enregistrer</button>
            </form>
        </td>
        <td class="actions">
            <form method="post" action="#">
                <button type="submit" class="btn btn-edit">Modifier</button>
            </form>
            <form method="post" action="reservation" onsubmit="return confirm('Annuler cette réservation ?');">
                <button type="submit" class="btn btn-cancel">Annuler</button>
            </form>
        </td>
    </tr>
</table>

</body>
</html>
