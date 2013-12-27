<?php
    echo _("<h3>Weather data</h3>");
    // Details about the API:
    // http://bugs.openweathermap.org/projects/api/wiki/Api_2_5_weather
    $url = 'http://api.openweathermap.org/data/2.5/weather?q=Berne,ch&unit=metrics&mode=json';

    // Get the data from OpenWeatherMap
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
    echo _("<p>Temperatur: $tempC °C<br/>\n");
    echo _("Humidity: $humidity %<br/>\n");
    echo _("Pressure: $pressure Pa</p>\n");
?>
