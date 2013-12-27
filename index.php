<?php 
    require_once('scripts/cookie.php');
    lastVisit('LastVisit', 3600);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webshop Pencil AG for Pencils">
    <meta name="author" content="Fabian Affolter">
    <title>Webshop Pencil AG | Home</title>

    <link href="css/webshop.css" rel="stylesheet">
<!--    <script type="text/javascript">
    function dialog() {
        name = window.prompt("Name", "your name");
        result = window.confirm("Hello " + name + ". Continue?");
    if (result) window.alert("Welcome!");
    }
    </script>-->
  </head>

  <body onload="dialog()">
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
        <!-- Action container aka Jumbotron Bootstrap -->
        <div class="action">
          <h1>Wochen-Aktion</h1>
          <p>Dies ist eine super Aktion. 10 Bleistifte für CHF 8.</p>
        </div>
        <!-- Action container -->

        <!-- Selected products -->
        <div>
            <p>Hier hat es zufällige Produkte...Die Bleistifte und deren Freunde...</p>
        </div>
        <!-- Selected products -->
            <?php
                require_once('config/dbconnect.php');
                if (mysqli_connect_errno() == 0) {
                    $sql = "SELECT * FROM products";
                    $results = $connection->query($sql);
                    echo "Wir haben die unglaubliche Menge von ".$results->num_rows." Produkten im Sortiment."."<br />"."\n";
                    $results->close();
                } else {
                    echo "Database connection error";
                }
                $connection->close();
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
<div class="footer">
    <?php 
     if(isset($_COOKIE['LastVisit'])) { 
        $last = $_COOKIE['LastVisit']; 
        echo "You last visited us on ".$last; 
     } else { 
        echo "This is your first visit."; 
     } 
    ?>
    </div>
    <!-- Footer -->
  </body>
</html>
