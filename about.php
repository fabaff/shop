<?php
	session_start();
?>
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
                require('scripts/header.php');
                echo head();
            ?>
        <!-- Navigation -->
            <?php 
                require('scripts/menu.php');
                echo menu();
            ?>
    <!-- Header -->
    <!-- Content -->
        <?php
            echo "<h3>";
            echo _('Address');
            echo "</h3>";
            $content = file_get_contents('company.txt');
            echo $content;
        ?>
    <!-- Map -->
        <?php
            echo "<h3>";
            echo _('Map');
            echo "</h3>";
	        echo "<div id=\"map\" class=\"map\" style=\"width: 600px; height: 400px\"></div>";
	        echo "<script src=\"scripts/leaflet.js\"></script>";
	        echo "<script src=\"scripts/leaflet-providers.js\"></script>";
	        echo "<script src=\"scripts/leaflet-osm.js\"></script>";
        ?>
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
        require('scripts/footer.php');
        echo foot();
    ?>
    <!-- Footer -->
  </body>
</html>
