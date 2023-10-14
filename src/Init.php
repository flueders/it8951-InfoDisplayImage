<?php

namespace It8951InfoDisplayImage;

use Symfony\Component\Dotenv\Dotenv;
use League\Plates\Engine;

class Init
{
    private WeatherForecastWidget $weatherForecast;
    private Engine $templates;
    private Dotenv $dotenv;

    function __construct()
    {
        $this->dotenv = new Dotenv();
        $this->dotenv->load(__DIR__ . '/../.env');

        $this->templates = new Engine(__DIR__ . '/../templates');

        $this->weatherForecast = new WeatherForecastWidget();
        $this->print();
    }

    private function print()
    {
        echo $this->templates->render('default', $this->weatherForecast->widgetVariables);
    }
}
