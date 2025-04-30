<?php
class Hotel {
    public function read() {
        return [
            ['ville' => 'Paris', 'nom' => 'Hôtel Lutetia'],
            ['ville' => 'Lyon', 'nom' => 'Hôtel de la Gare'],
            ['ville' => 'Marseille', 'nom' => 'Hôtel du Port']
        ];
    }

    public function search($ville, $arrivee, $depart) {
        $hotels = $this->read(); 

        return array_filter($hotels, function ($hotel) use ($ville) {
            return stripos($hotel['ville'], $ville) !== false;
        });
    }
}
?>
