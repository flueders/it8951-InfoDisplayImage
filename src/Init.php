<?php

namespace It8951InfoDisplayImage;

use Symfony\Component\Dotenv\Dotenv;

class Init
{
    private WeatherForecastWidget $weatherForecast;
    private Dotenv $dotenv;

    function __construct()
    {
        $this->dotenv = new Dotenv();
        $this->dotenv->load(__DIR__ . '/../.env');

        $this->weatherForecast = new WeatherForecastWidget();
        $this->print();
    }

    private function print()
    {
        require(__DIR__ . '/../templates/default.php');
    }
}
