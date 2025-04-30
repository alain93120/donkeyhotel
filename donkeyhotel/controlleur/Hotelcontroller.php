<?php
require_once(__DIR__ . '/../modeles/City.php');


class HomeController {
    public function read() {
        $cityobjet = new read();
        $city = $cityobjet->read();
        var_dump($city);
        require "./vues/city.php";

    }
}

$home = new HomeController();
$home->read();

?>
