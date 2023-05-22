<?php
use It8951InfoDisplayImage\WeatherForecast;

$weather = new WeatherForecast(); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/style.css">
    <title>Document</title>
</head>
<body>
    <h1><?=date('Y-m-d H:i:s')?></h1>
    <?= $weather->getWeatherString()?>
</body>
</html>