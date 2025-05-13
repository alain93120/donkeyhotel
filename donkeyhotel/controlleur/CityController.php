<?php
require_once(__DIR__ . '/../modeles/Hotel.php');

class CityController {

    public function searchByCity(PDO $pdo, string $city) {
        $hotelModel = new Hotel($pdo);
        $hotels = $hotelModel->searchByCity($city);

        // Sécuriser l'affichage de la ville
        $city = htmlspecialchars($city);

        // Passer les données à la vue
        require __DIR__ . '/../vues/city.php';
    }
}

// Connexion à la base de données
$pdo = new PDO("mysql:host=localhost;dbname=donkeyhotel;charset=utf8", "root", "");

// Si une recherche est soumise via formulaire POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $city = $_POST['city'] ?? null;

    if ($city) {
        $controller = new CityController();
        $controller->searchByCity($pdo, $city);
        exit;
    } else {
        $message = "Veuillez entrer une ville.";
    }
}

// Affiche le formulaire de recherche (aucune ville soumise)
require __DIR__ . '/../vues/city.php';
