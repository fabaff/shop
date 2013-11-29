<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webshop Pencil AG für Bleistifte">
    <meta name="author" content="Fabian Affolter">
    <title>Webshop Pencil AG | Produkte</title>

    <link href="css/webshop.css" rel="stylesheet">
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
        <!-- Selected products -->
        <div>
            <h3>Übersicht Tabellen-Inhalte</h3>

            <?php
                $connection = @mysql_connect("localhost", "root", "webshop");
                if ($connection) {
                    // Select database
                    mysql_select_db("webshop");

                    // Products
                    // tbd
                    
                    // Get pencils
                    $sql_pencils = "SELECT * FROM pencil";
                    $res_pencils = mysql_query($sql_pencils);
                    echo mysql_num_rows($res_pencils)." pencil entries found."."<br />"."\n";
                    echo "<ul>"."\n";
                    while ($s_pencils = mysql_fetch_assoc($res_pencils)) {
                        echo "<li>".$s_pencils["type"]."</li>";
                    }
                    echo "</ul>"."\n";

                    echo "<br />";
                    // Get colors
                    $sql_colors = "SELECT * FROM colors";
                    $res_colors = mysql_query($sql_colors);
                    echo mysql_num_rows($res_colors)." color entries found."."<br />"."\n";
                    echo "<ul>"."\n";
                    while ($s_colors = mysql_fetch_assoc($res_colors)) {
                        echo "<li>".$s_colors["type"]."</li>";
                    }
                    echo "</ul>"."\n";

                    echo "<br />";
                    // Get hardness
                    $sql_hard = "SELECT * FROM hardness";
                    $res_hard = mysql_query($sql_hard);
                    echo mysql_num_rows($res_hard)." hardness entries found."."<br />"."\n";
                    echo "<ul>"."\n";
                    while ($s_hard = mysql_fetch_assoc($res_hard)) {
                        echo "<li>".$s_hard["type"]."</li>";
                    }
                    echo "</ul>"."\n";
                    mysql_close();
                }
                else echo "Connection error";
            ?>
        </div>
        <!-- Selected products -->
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
  </body>
</html>
