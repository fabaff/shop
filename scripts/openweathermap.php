<?php
    echo "<h3>Wetter-Daten</h3>";
    // Details about the API:
    // http://bugs.openweathermap.org/projects/api/wiki/Api_2_5_weather
    $url = 'http://api.openweathermap.org/data/2.5/weather?q=Berne,ch&unit=metrics&mode=json';

    // Get the data from OPenWeatherMap
    $json = file_get_contents($url);

    // Uncomment for debugging
    //echo $json;

    // Decode the json
    $data = json_decode($json);
    
    // Vars
    $tempC = round((273.15 - $data->main->temp)*100) / 100;
    $humidity = $data->main->humidity;
    $pressure = $data->main->pressure;

    // Output
    echo "<p>Temperatur: $tempC °C<br/>\n";
    echo "Luftfeuchtigkeit: $humidity %<br/>\n";
    echo "Luftdruck: $pressure Pa</p>\n";
?>
