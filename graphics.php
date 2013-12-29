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
    <title>Webshop Pencil AG | Graphics</title>

    <link href="css/webshop.css" rel="stylesheet">
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
        <div>
            <h3>Check availability of GD support</h3>
            <p>
            <?php
                if (!function_exists("GD")){
                    echo "GD is not installed\n";
                }
                else{
                    echo "GD is supported\n";
                }
                echo "<br/>"."\n";
                echo "Supported image type: ".imagetypes();
            ?>
            </p>
            <h3>Check drawing capability</h3>
            <p>
                <img src="scripts/blackbox.php" />
            </p>

            <h3>Scaling</h3>
            tbd
            <!--<?php
            //    require('scripts/graphics.php');
                echo scaling('images/default.png', 3);
            ?>-->
        </div>
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
