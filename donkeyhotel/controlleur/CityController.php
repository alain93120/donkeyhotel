<?php
require_once(__DIR__ . '/../modeles/Hotel.php');

class CityController {
    public function showCities() {
        $hotelModel = new Hotel(); 
        $cities = $hotelModel->read(); 

        require "./vues/Hotel.php"; 
    }
}

$cityController = new CityController();
$cityController->showCities();
?>
