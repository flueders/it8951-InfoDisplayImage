<?xml version="1.0" encoding="UTF-8" standalone="no"?>
<!-- Created with Inkscape (http://www.inkscape.org/) -->

<svg
   width="1872"
   height="1404"
   viewBox="0 0 1872 1404"
   version="1.1"
   xmlns="http://www.w3.org/2000/svg"
   xmlns:svg="http://www.w3.org/2000/svg">
  <g id="layer1">
    <?php $this->insert('weather', [
    "currentTemperature" => $currentTemperature,
    "precipitation" => $precipitation,
    "forecastTime" => $forecastTime,
    "currentWeatherSVG" => $currentWeatherSVG,
    "forecastWeatherSVG" => $forecastWeatherSVG
    ]) ?>
  </g>
</svg>
