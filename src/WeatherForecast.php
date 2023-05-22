<?php
namespace It8951InfoDisplayImage;

use Cmfcmf\OpenWeatherMap;
use Http\Adapter\Guzzle7\Client;
use Http\Factory\Guzzle\RequestFactory;
use Psr\Http\Message\RequestFactoryInterface;
use Symfony\Component\Dotenv\Dotenv;


class WeatherForecast
{
    private OpenWeatherMap $owm;
    private Dotenv $dotenv = new Dotenv();
    private RequestFactoryInterface $httpRequestFactory = new RequestFactory();
    private Client $httpClient = Client::createWithConfig([]);

    public function __construct()
    {
        $this->dotenv->load(__DIR__ . '/../.env');
        $this->owm = new OpenWeatherMap($_ENV['OPEN_WHEATER_API_KEY'], $this->httpClient, $this->httpRequestFactory, );
    }

    public function getWeatherString(): string {
        $forecast = $this->owm->getWeatherForecast($_ENV['CITY'], $_ENV['UNITS'], $_ENV['LANG'], '', 5);
        return $forecast->current()->weather->icon;
    }

}