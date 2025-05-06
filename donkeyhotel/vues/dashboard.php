<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php?action=login');
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mon compte - Donkey Hôtel</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<?php 
require_once ('./nav.php'); 
?>
    <header>
        <h1>DONKEY HÔTEL</h1>
       
    </header>
    <main>
        <h2>Trouvez votre hôtel</h2>
        <form>
            <input type="text" name="city" placeholder="Ville">
            <input type="date" name="arrival">
            <input type="date" name="departure">
            <button type="submit">Rechercher</button>
        </form>

        <section>
            <h3>NIVEL HÔTEL - 200 € / nuit</h3>
            <p>Arrivée : Lundi 28 avril 2025 - Retour : Mercredi 30 avril 2025</p>
            <button>Réserver</button>
        </section>
    </main>
</body>
</html>
