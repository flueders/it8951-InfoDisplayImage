<?php
namespace It8951InfoDisplayImage;

use Symfony\Component\Dotenv\Dotenv;

class Init{
    private WeatherForecast $weatherForeCast;
    private Dotenv $dotenv;

    function __construct(){
        $this->dotenv = new Dotenv();
        $this->dotenv->load(__DIR__ . '/../.env');

        $this->weatherForeCast = new WeatherForecast();
        $this->print();
    }

    private function print(){
        require('../templates/default.php');
    }
}