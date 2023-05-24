<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fontawesome.min.css">
    <link rel="stylesheet" href="solid.min.css">

    <title>Info screen</title>
</head>

<body>
    <h1>
        <?= date($_ENV['DATE_FORMAT']) ?>
    </h1>
    <div id="weather">
        <div id="currentWeather">
            <?= $this->weatherForeCast->getCurrentWeatherIcon() ?>
            <div class="weatherTextbox">
                <i class="fa-solid fa-temperature-three-quarters"></i>
                <?= $this->weatherForeCast->currentWeather->temperature->now ?>
            </div>
            <div class="weatherTextbox">
                <i class="fa-solid fa-droplet"></i>
                <?= $this->weatherForeCast->currentWeather->precipitation ?>
            </div>
        </div>
        <div id="upcomingWeather">
            <?= $this->weatherForeCast->getTodaysWeatherIcon() ?>
        </div>
    </div>
</body>

</html>