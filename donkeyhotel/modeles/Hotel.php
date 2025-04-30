<?php

class Hotel {
    public function search($ville, $arrivee, $depart) {
        $hotels = [
            ['ville' => 'Paris', 'nom' => 'Hôtel Lutetia'],
            ['ville' => 'Lyon', 'nom' => 'Hôtel de la Gare'],
            ['ville' => 'Marseille', 'nom' => 'Hôtel du Port']
        ];

        // On filtre uniquement selon la ville pour cet exemple
        return array_filter($hotels, function ($hotel) use ($ville) {
            return stripos($hotel['ville'], $ville) !== false;
        });
    }
}
?>
