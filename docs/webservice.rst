.. 

Web service
===========
Tow web services are integrated to take advantages of online available data
sources.

Map
---
`Leafletjs`_, a JavaScript library for working with interactive maps from
OpenStreetMap (`OSM`_), is implemented as a show case for a simple web service.

.. _Leafletjs: http://leafletjs.com/
.. _OSM: http://www.openstreetmap.org

The basic steps to integrate a map is shown below::

    <div id="map" class="map" style="width: 600px; height: 400px"></div>
    ...
	<script src="scripts/leaflet.js"></script>
	<script src="scripts/leaflet-providers.js"></script>
	<script>
        var map = L.map('map', {
	        center: [25.0472, -77.3255],
	        zoom: 12,
	        zoomControl: true
        });

        var defaultLayer = L.tileLayer.provider('OpenStreetMap.Mapnik').addTo(map)
    </script>

Weather
-------
The `OpenWeatherMap`_ service provides free weather data and a forecast API for
web applications. ::

    <?php
        // Details about the API:
        // http://bugs.openweathermap.org/projects/api/wiki/Api_2_5_weather
        $url = 'http://api.openweathermap.org/data/2.5/weather?q=Berne,ch&unit=metrics&mode=json';

        $json = file_get_contents($url);
        $data = json_decode($json);
        
        $tempC = round((273.15 - $data->main->temp)*100) / 100;
        $humidity = $data->main->humidity;
        $pressure = $data->main->pressure;

        echo "<p>Temperatur: $tempC °C<br/>\n";
        echo "Luftfeuchtigkeit: $humidity %<br/>\n";
        echo "Luftdruck: $pressure Pa</p>\n";
    ?>

.. _OpenWeatherMap: http://openweathermap.org/
