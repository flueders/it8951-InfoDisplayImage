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

        $this->widgets[] = new Widgets\WeatherForecastWidget();
        $this->templates = new Engine(__DIR__ . '/../templates', "svg.tpl");
    }

    public function generateImage()
    {
        header("Content-Type: image/bmp");
        $imagick = new \Imagick();
        $imagick->readImageBlob($this->generateSVG());
        $imagick->setImageFormat('bmp');
        echo $imagick->getImagesBlob();
    }
    
    private function generateSVG(): string
    {
        $templateVars = [];

        foreach ($this->widgets as $widget) {
            $templateVars = array_merge($templateVars, $widget->widgetVariables);
        }

        return $this->templates->render('default', $templateVars);
    }

}
