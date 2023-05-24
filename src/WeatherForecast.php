<?php
namespace It8951InfoDisplayImage;

use Cmfcmf\OpenWeatherMap;
use Http\Adapter\Guzzle7\Client;
use Http\Factory\Guzzle\RequestFactory;
use Psr\Http\Message\RequestFactoryInterface;


class WeatherForecast
{
    private OpenWeatherMap $owm;
    private RequestFactoryInterface $httpRequestFactory;
    private Client $httpClient;

    private const ICON_PATH = '/img/';

    public function __construct()
    {
        $this->httpRequestFactory = new RequestFactory();
        $this->httpClient = Client::createWithConfig(['verify' => false]);
        $this->owm = new OpenWeatherMap($_ENV['OPEN_WHEATER_API_KEY'], $this->httpClient, $this->httpRequestFactory);
    }

    public function getCurrentWeatherIconPath(): string
    {
        $forecast = $this->owm->getWeatherForecast($_ENV['CITY'], $_ENV['UNITS'], $_ENV['LANG'], '', 5);
        return self::ICON_PATH . $forecast->current()->weather->icon . '.svg';
    }

}