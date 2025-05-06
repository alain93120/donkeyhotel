
<?php
require_once('Base.php');

class Hotel extends Base
{
    public $table = "city";


    public function read()
    {
        $sql = 'select city.name, reservation.startdate, reservation.enddate
         from city
         inner join hotel 
         on city.id = hotel.city_id
         inner join reservation
         on reservation.hotel_id = hotel.id '; 
        $query = $this->pdo->query($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }

    public function showDetail()
    {
        $sql = 'select city.name, hotel.name,hotel.pricenight, reservation.startdate, reservation.enddate
        from city
        inner join hotel 
        on city.id = hotel.city_id
        inner join reservation
        on reservation.hotel_id = hotel.id';
        $query = $this->pdo->query($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
