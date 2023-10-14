<div id="weather">
    <div id="currentWeather">
        <?= $currentWeatherSVG ?>
        <div class="weatherTextbox">
            <i class="fa-solid fa-temperature-three-quarters"></i>
            <?= $this->e($currentTemperature)?>
            <?= $this->e($lastUpdate)  ?>

        </div>
        <div class="weatherTextbox">
            <i class="fa-solid fa-droplet"></i>
            <?= $this->e($precipitation) ?>
        </div>
    </div>
    <div id="upcomingWeather">
        <?= $forecastWeatherSVG ?>
        <div class="weatherTextbox">
            <?= $this->e($forecastTime) ?>
        </div>
    </div>
</div>