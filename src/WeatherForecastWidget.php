<?php
namespace It8951InfoDisplayImage;

use Cmfcmf\OpenWeatherMap;
use Cmfcmf\OpenWeatherMap\CurrentWeather;
use Cmfcmf\OpenWeatherMap\WeatherForecast;
use Http\Adapter\Guzzle7\Client;
use Http\Factory\Guzzle\RequestFactory;
use Psr\Http\Message\RequestFactoryInterface;


class WeatherForecastWidget
{
    private OpenWeatherMap $owm;
    private RequestFactoryInterface $httpRequestFactory;
    private Client $httpClient;

    public CurrentWeather $currentWeather;

    public WeatherForecast $weatherForecast;

    private const ICON_PATH = '../img/';

    public function __construct()
    {
        $this->httpRequestFactory = new RequestFactory();
        $this->httpClient = Client::createWithConfig(['verify' => false]);
        $this->owm = new OpenWeatherMap($_ENV['OPEN_WHEATER_API_KEY'], $this->httpClient, $this->httpRequestFactory);
        $this->currentWeather = $this->owm->getWeather($_ENV['CITY'], $_ENV['UNITS'], $_ENV['LANG']);
        //$this->weatherForecast = $this->owm->getWeatherForecast($_ENV['CITY'], $_ENV['UNITS'], $_ENV['LANG'], '', 1);
        $this->getTodaysWeatherIcon();
    }

    public function getCurrentWeatherIcon(): string
    {
        $svgFile = file_get_contents(self::ICON_PATH . $this->currentWeather->weather->icon . '.svg');
        return $svgFile;
    }
    public function getTodaysWeatherIcon()
    {

    }

}