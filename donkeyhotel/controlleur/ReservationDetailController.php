<?php
require_once __DIR__ . '/../models/Reservation.php';

class ReservationDetailController {

    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function handleReservation(array $postData): Reservation {
        $basePrice = 200;

        $selectedOptions = $postData['options'] ?? []; // ['Petit déjeuner-15', 'Véhicule-20']
        $options = [];
        $totalOptions = 0;

        foreach ($selectedOptions as $opt) {
            [$name, $price] = explode('-', $opt); // Séparation nom-prix
            $price = (float) $price;
            $options[] = ['name' => $name, 'price' => $price];
            $totalOptions += $price;
        }

        $reservationData = [
            'hotel' => 'NIVEL HÔTEL',
            'price' => $basePrice,
            'options' => $options,
            'firstname' => 'Dupont',
            'lastname' => 'Durant',
            'phone' => '06 22 22 22 22',
            'total' => $basePrice + $totalOptions
        ];

        return new Reservation($reservationData);
    }
}
