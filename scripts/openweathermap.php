<?php
    echo "<h3>";
    echo _('Weather data');
    echo "</h3>";
    // Details about the API:
    // http://bugs.openweathermap.org/projects/api/wiki/Api_2_5_weather
    $url = 'http://api.openweathermap.org/data/2.5/weather?q=Berne,ch&unit=metrics&mode=json';

    // Get the data from OpenWeatherMap
    $json = file_get_contents($url);

    // Uncomment for debugging
    //echo $json;

    // Decode the json
    $data = json_decode($json);

    if(!empty($data)) {
        // Get the relevant data out of the json object
        $tempC = round((273.15 - $data->main->temp)*100) / 100;
        $humidity = $data->main->humidity;
        $pressure = $data->main->pressure;

        // Output
        echo '<p>';
        echo _('Temperature: $tempC °C');
        echo '<br/>';
        echo _('Humidity: $humidity %');
        echo '<br/>';
        echo _('Pressure: $pressure Pa');
        echo '</p>';
    } else {
        echo _('Sorry, there are no data available right now.');
    }
?>
