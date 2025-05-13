<?php

class Reservation {
    public string $hotel;
    public float $price;
    public array $options; // array of ['name' => ..., 'price' => ...]
    public string $firstname;
    public string $lastname;
    public string $phone;
    public float $total;

    public function __construct(array $data) {
        $this->hotel = $data['hotel'];
        $this->price = $data['price'];
        $this->options = $data['options'] ?? [];
        $this->firstname = $data['firstname'];
        $this->lastname = $data['lastname'];
        $this->phone = $data['phone'];
        $this->total = $data['total'];
    }
}
