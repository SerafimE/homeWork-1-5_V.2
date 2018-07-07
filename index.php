<?php
$link = 'http://api.openweathermap.org/data/2.5/weather';
$city = '498817';
$units = 'metric';
$appid = 'ef275086da6b4c2a604c04dd29f2e5dc';
$url = "$link?id=$city&units=$units&appid=$appid";

$weather = (!empty(file_get_contents($url))) ? file_get_contents($url) : 'Не удалось получить данные';
$array_weather = (!empty(json_decode($weather, true))) ? json_decode($weather, true) : 'Ошибка декодирования json';
$name = (!empty($array_weather['name'])) ? $array_weather['name'] : 'не удалось получить данные';
$country = (!empty($array_weather['sys']['country'])) ? $array_weather['sys']['country'] : 'не удалось получить данные';
$sunrise = (!empty($array_weather['sys']['sunrise'])) ? $array_weather['sys']['sunrise'] : 'не удалось получить данные';
$sunset = (!empty($array_weather['sys']['sunset'])) ? $array_weather['sys']['sunset'] : 'не удалось получить данные';
$icon = (!empty('http://openweathermap.org/img/w/' . $array_weather['weather'][0]['icon'] . '.png')) ? 'http://openweathermap.org/img/w/' . $array_weather['weather'][0]['icon'] . '.png' : 'не удалось получить данные';
$temp = (!empty($array_weather['main']['temp'])) ? $array_weather['main']['temp'] : 'не удалось получить данные';
$wind_speed = (!empty($array_weather['wind']['speed'])) ? $array_weather['wind']['speed'] : 'не удалось получить данные';
$pressure = (!empty($array_weather['main']['pressure'])) ? $array_weather['main']['pressure'] : 'не удалось получить данные';
$humidity = (!empty($array_weather['main']['humidity'])) ? $array_weather['main']['humidity'] : 'не удалось получить данные';

date_default_timezone_set('Europe/Moscow');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/style.css" rel="stylesheet">
    <title>Домашнее задание к лекции 1.5</title>
</head>
<body>
<div>
    <h1>Weather and forecasts in <?= $name . ', ' . $country ?></h1>
    <p id="date"><?= date('l j F Y') ?></p>
    <p id="date"><?= date('H:i') ?></p>
    <p class="condition"><?= 'sunrise: ' . date('H:i', $sunrise) ?></p>
    <p class="condition"><?= 'sunset: ' . date('H:i', $sunset) ?></p>
    <p id="img"><img src="<?= $icon ?>" alt="icon weather"></p>
    <p class="condition"><?= 'temp: ' . $temp . ' °C' ?></p>
    <p class="condition"><?= 'wind speed: ' . $wind_speed . ' m/s' ?></p>
    <p class="condition"><?= 'pressure: ' . $pressure . ' gPa' . '/' . round($pressure * 0.75006375541921) . ' mm' ?></p>
    <p id="humidity"><?= 'Humidity: ' . $humidity . '%' ?></p>
</div>
</body>
</html>
