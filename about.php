<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webshop Pencil AG für Bleistifte">
    <meta name="author" content="Fabian Affolter">
    <title>Webshop Pencil AG | About</title>

    <link href="css/webshop.css" rel="stylesheet">
    <link href="css/leaflet.css" rel="stylesheet"/>
  </head>
  <body>
    <div class="container" style="margin-top: 10px;">
    <!-- Header -->
      <div class="panel panel-default">
        <div class="panel-body">
        <!-- Logo and company name -->
            <?php 
                require('header.php');
                echo head();
            ?>
        <!-- Navigation -->
            <?php 
                require('menu.php');
              
  echo menu();
            ?>
    <!-- Header -->
    <!-- Content -->
        <?php
            $str = file_get_contents('company.txt');
            echo $str;
        ?>

    <!-- Map -->
        <h3>Lageplan</h3>
	    <div id="map" class="map" style="width: 600px; height: 400px"></div>
    <!-- Weather -->
    <?php 
        require('scripts/openweathermap.php');
    ?>


    <!-- Content -->
        </div>
      </div>
    </div>
    <!-- Footer -->
    <?php 
        require('footer.php');
        echo foot();
    ?>
    <!-- Footer -->
    <!-- Javascript -->
	<script src="scripts/leaflet.js"></script>
	<script src="scripts/leaflet-providers.js"></script>
	<script src="scripts/leaflet_osm.js"></script>
    <!-- Javascript -->
  </body>
</html>
