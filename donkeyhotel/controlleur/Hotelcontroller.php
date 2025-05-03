<?php
require_once(__DIR__ . '/../modeles/Hotel.php');

class HotelController {
    public function showHotels() {
        $hotelModel = new Hotel(); 
        $hotels = $hotelModel->read(); 

        require __DIR__ . '/../vues/hotel.php'; 
    }
}
