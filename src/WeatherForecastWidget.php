<?php

namespace It8951InfoDisplayImage;

use DateTime;

use Cmfcmf\OpenWeatherMap;
use Cmfcmf\OpenWeatherMap\CurrentWeather;
use Cmfcmf\OpenWeatherMap\Forecast;
use Cmfcmf\OpenWeatherMap\WeatherForecast;

use Http\Adapter\Guzzle7\Client;
use Http\Factory\Guzzle\RequestFactory;
use Psr\Http\Message\RequestFactoryInterface;


class WeatherForecastWidget
{
    private OpenWeatherMap $owm;
    private RequestFactoryInterface $httpRequestFactory;
    private Client $httpClient;

    private CurrentWeather $currentWeather;

    private WeatherForecast $weatherForecasts;
    private Forecast $selectedForecast;

    private const ICON_PATH = __DIR__ . '/../img/';


    public array $widgetVariables;


    public function __construct()
    {
        $this->httpRequestFactory = new RequestFactory();
        $this->httpClient = Client::createWithConfig(['verify' => false]);
        $this->owm = new OpenWeatherMap($_ENV['OPEN_WHEATER_API_KEY'], $this->httpClient, $this->httpRequestFactory);
        $this->currentWeather = $this->owm->getWeather($_ENV['CITY'], $_ENV['UNITS'], $_ENV['LANG']);
        $this->weatherForecasts = $this->owm->getWeatherForecast($_ENV['CITY'], $_ENV['UNITS'], $_ENV['LANG'], '', 1);
        $this->selectForecastFromList();

        $this->widgetVariables["currentTemperature"] = $this->currentWeather->temperature->now;
        $this->widgetVariables["lastUpdate"] = $this->currentWeather->lastUpdate->format("G:i") . " Uhr";
        $this->widgetVariables["precipitation"] = $this->currentWeather->precipitation . "%";

        $this->widgetVariables["currentWeatherSVG"] = $this->getCurrentWeatherIcon();
        $this->widgetVariables["forecastWeatherSVG"] = $this->getForecastWeatherIcon();

        $this->widgetVariables["forecastTime"] = $this->selectedForecast->time->from->format("G") . " Uhr";

    }

    private function getCurrentWeatherIcon(): string
    {
        $svgFile = file_get_contents(self::ICON_PATH . $this->currentWeather->weather->icon . '.svg');
        return $svgFile;
    }

    private function selectForecastFromList(): ?Forecast
    {
        foreach ($this->weatherForecasts as $forecast) {
            if ($forecast->time->from >= new DateTime("now +6 hours")) {
                return $this->selectedForecast = $forecast;
            }
        }
    }

    private function getForecastWeatherIcon(): string
    {
        $svgFile = file_get_contents(self::ICON_PATH . $this->selectedForecast->weather->icon . '.svg');
        return $svgFile;
    }
}
