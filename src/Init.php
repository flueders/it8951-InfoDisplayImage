<?php
namespace It8951InfoDisplayImage;

use Symfony\Component\Dotenv\Dotenv;

class Init{
    private WeatherForecastWidget $weatherForeCast;
    private Dotenv $dotenv;

    function __construct(){
        $this->dotenv = new Dotenv();
        $this->dotenv->load(__DIR__ . '/../.env');

        $this->weatherForeCast = new WeatherForecastWidget();
        $this->print();
    }

    private function print(){
        require('../templates/default.php');
    }
}