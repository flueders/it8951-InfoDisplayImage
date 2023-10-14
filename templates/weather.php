<div id="weather">
    <div id="currentWeather">
        <?= $this->weatherForecast->getCurrentWeatherIcon() ?>
        <div class="weatherTextbox">
            <i class="fa-solid fa-temperature-three-quarters"></i>
            <?= $this->weatherForecast->currentWeather->temperature->now ?>
            <?= $this->weatherForecast->currentWeather->lastUpdate->format("G:i") . " Uhr" ?>

        </div>
        <div class="weatherTextbox">
            <i class="fa-solid fa-droplet"></i>
            <?= $this->weatherForecast->currentWeather->precipitation ?>
        </div>
    </div>
    <div id="upcomingWeather">
        <?= $this->weatherForecast->getTodaysWeatherIcon() ?>
        <div class="weatherTextbox">
            <?= $this->weatherForecast->selectedForecast->time->from->format("G") . " Uhr" ?>
        </div>
    </div>
</div>