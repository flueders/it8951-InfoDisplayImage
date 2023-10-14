<?php

namespace It8951InfoDisplayImage;

use Cmfcmf\OpenWeatherMap;
use Cmfcmf\OpenWeatherMap\CurrentWeather;
use Cmfcmf\OpenWeatherMap\Forecast;
use Cmfcmf\OpenWeatherMap\WeatherForecast;
use DateTime;
use Http\Adapter\Guzzle7\Client;
use Http\Factory\Guzzle\RequestFactory;
use Psr\Http\Message\RequestFactoryInterface;


class WeatherForecastWidget
{
    private OpenWeatherMap $owm;
    private RequestFactoryInterface $httpRequestFactory;
    private Client $httpClient;

    public CurrentWeather $currentWeather;

    public WeatherForecast $weatherForecasts;
    public Forecast $selectedForecast;

    private const ICON_PATH = __DIR__ . '/../img/';

    public function __construct()
    {
        $this->httpRequestFactory = new RequestFactory();
        $this->httpClient = Client::createWithConfig(['verify' => false]);
        $this->owm = new OpenWeatherMap($_ENV['OPEN_WHEATER_API_KEY'], $this->httpClient, $this->httpRequestFactory);
        $this->currentWeather = $this->owm->getWeather($_ENV['CITY'], $_ENV['UNITS'], $_ENV['LANG']);
        $this->weatherForecasts = $this->owm->getWeatherForecast($_ENV['CITY'], $_ENV['UNITS'], $_ENV['LANG'], '', 1);
        $this->selectForecastFromList();
    }

    public function getCurrentWeatherIcon(): string
    {
        $svgFile = file_get_contents(self::ICON_PATH . $this->currentWeather->weather->icon . '.svg');
        return $svgFile;
    }

    private function selectForecastFromList(){
        foreach ($this->weatherForecasts as $forecast) {
            if ($forecast->time->from >= new DateTime("now +6 hours")) {
                return $this->selectedForecast = $forecast;
            }
        }
    }
    
    public function getTodaysWeatherIcon()
    {
        $svgFile = file_get_contents(self::ICON_PATH . $this->selectedForecast->weather->icon . '.svg');
        return $svgFile;    
    }

}
