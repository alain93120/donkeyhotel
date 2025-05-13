<?php
require_once(__DIR__ . '/../modeles/Hotel.php');

class HotelController {
    public function showHotels($pdo) {
        $hotelModel = new Hotel($pdo); 
        $hotels = $hotelModel->readAll(); 

        require __DIR__ . '/../vues/hotel.php'; 
    }

    
    
}
