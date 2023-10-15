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

        $this->templates = new Engine(__DIR__ . '/../templates');

        $this->widgets[] = new WeatherForecastWidget();
    }

    public function print()
    {
        $templateVars = [];

        foreach ($this->widgets as $widget) {
            $templateVars = array_merge($templateVars, $widget->widgetVariables);
        }

        echo $this->templates->render('default', $templateVars);
    }

    public function generateImage()
    {

        $requestUrl =  (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $requestUrl = str_replace("image.php", "index.php", $requestUrl);

        $outputFile = __DIR__. "/../tmp/output.bmp";

        $command = "wkhtmltoimage $requestUrl $outputFile";
        exec($command);


        $fp = fopen($outputFile, 'rb');

        header("Content-Type: image/bmp");
        header("Content-Length: " . filesize($outputFile));
        fpassthru($fp);
        fclose($fp);
    }
}
