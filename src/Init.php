<?php

namespace It8951InfoDisplayImage;

use Symfony\Component\Dotenv\Dotenv;
use League\Plates\Engine;

class Init
{
    private Engine $templates;
    private Dotenv $dotenv;

    /** @var Widget[] $widgets  */
    private array $widgets;
    

    function __construct()
    {
        $this->dotenv = new Dotenv();
        $this->dotenv->load(__DIR__ . '/../.env');

        $this->$widgets[] = new It8951InfoDisplayImage\Widgets\WeatherForecastWidget();
        $this->templates = new Engine(__DIR__ . '/../templates');
    }

    public function print()
    {
        $templateVars = [];

        foreach ($this->widgets as $widget) {
            $templateVars = array_merge($templateVars, $widget->widgetVariables);
        }

        return $this->templates->render('default', $templateVars);
    }

    public function generateImage()
    {
        $imagick = new \Imagick();
        $imagick->readImageBlob($this->print());
        $imagick->setImageFormat('bmp');
        $imagick->writeImage('img.bmp');
        $imagick->destroy();
    }
}
