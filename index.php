<?php
	session_start();

    require_once('config/dbconnect.php');
    require_once('scripts/helpers.php');
    require_once('scripts/cookie.php');

    lastVisit('LastVisit', 3600);

    if (empty($_SESSION)) {
        $_SESSION['hits'] = 1;
    } else {
        $_SESSION['hits'] = $_SESSION['hits'] + 1;
    }
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
<!--    <script >
    function dialog() {
        name = window.prompt("Name", "your name");
        result = window.confirm("Hello " + name + ". Continue?");
    if (result) window.alert("Welcome!");
    }
    </script>-->
<!--<body onload="dialog()">-->
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
        <!-- Action container aka Jumbotron Bootstrap -->
        <div id="showHide" class="jumbotron">
            <h2>Super deal of the week. Click here for details.</h2>
        </div>
        <div id="deal" style="display:none">We guess you like that offer ;-)</div>
        <br />
        <!-- Action container class="label label-default"-->
        <!-- Selected products -->
        <div>
            <p>This is one of our products:</p>

            <?php
                if ($connection->connect_errno == 0) {
                    // Get a random number
                    $id = rand(1, 5);
                    $sql = "SELECT * FROM products WHERE id='$id'";
                    $results = $connection->query($sql);
                    $result = $results->fetch_object();

                        echo "<div align=\"center\">";
                        echo "<h4>".$result->pname."</h4>";
                        $sql_color = "SELECT * FROM colors WHERE id=$result->color";
                        $result_color = $connection->query($sql_color);
                        $color = $result_color->fetch_object()->type;
                        echo getImage($color);
                        echo "<p><a class=\"btn btn-xs btn-default\" href=\"product.php?id=$result->id\" role=\"button\">View details</a>";
                        echo "</div>";
                    $results->close();
                } else {
                    echo "Database connection error";
                }
            ?>

        </div>
        <!-- Selected products -->
            <?php
                require_once('config/dbconnect.php');
                if ($connection->connect_errno == 0) {
                    $sql = "SELECT * FROM products";
                    $results = $connection->query($sql);
                    echo "<div align=\"center\">This shop contains the incredible amount of ".$results->num_rows." products.</div>"."\n";
                    $results->close();
                } else {
                    echo "Database connection error";
                }
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
     if (isset($_COOKIE['LastVisit'])) { 
        $last = $_COOKIE['LastVisit']; 
        echo "You last visited us on ".$last;
     } else { 
        echo "This is your first visit."; 
     }
    if (!empty($_SESSION['hits'])) {
        echo " Total ".$_SESSION['hits']." visits of this page.";
    }
    ?>
    </div>
    <!-- Footer -->
    <script type="text/javascript">
        document.getElementById("showHide").onclick = function() {
            var deal = document.getElementById("deal");
            if (deal.style.display == 'none') {
                deal.style.display = 'block';
                this.innerHTML = '10 pencils for CHF 8.';
            } else {
                deal.style.display = 'none';
                this.innerHTML = '<h2>Super deal of the week. Click here for details.</h2>';
            }
        }
    </script>
  </body>
</html>
