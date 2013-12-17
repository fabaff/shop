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
            <h3>Overview Table content</h3>
            <!-- This page is more or less a simple test page for the database connection. -->
            <!-- Keep in mind: The connection details are only in this page included (-> dbconnect.php). -->
            <?php
                $connection = new mysqli("localhost", "root", "webshop", "webshop");
                if (mysqli_connect_errno() == 0) {
                    // Get pencils
                    echo "<h4>Pencils</h4>"."\n";
                    $sql_pencils = "SELECT * FROM pencils";
                    $res_pencils = $connection->query($sql_pencils);
                    echo mysqli_num_rows($res_pencils)." pencil entries found."."<br />"."\n";
                    echo "<ul>"."\n";
                    while ($s_pencils = mysqli_fetch_assoc($res_pencils)) {
                        echo "<li>".$s_pencils["type"]."</li>";
                    }
                    echo "</ul>"."\n";
                    echo "<a href=\"add.php?table=pencils\">Add new entry</a>";
                    echo "<hr>";
                    // Get colors
                    echo "<h4>Colors</h4>"."\n";
                    $sql_colors = "SELECT * FROM colors";
                    $res_colors = $connection->query($sql_colors);
                    echo mysqli_num_rows($res_colors)." color entries found."."<br />"."\n";
                    echo "<ul>"."\n";
                    while ($s_colors = mysqli_fetch_assoc($res_colors)) {
                        echo "<li>".$s_colors["type"]."</li>";
                    }
                    echo "</ul>"."\n";
                    echo "<a href=\"add.php?table=colors\">Add new entry</a>";
                    echo "<hr>";
                    // Get hardness
                    echo "<h4>Hardness</h4>"."\n";
                    $sql_hard = "SELECT * FROM hardness";
                    $res_hard = $connection->query($sql_hard);
                    echo mysqli_num_rows($res_hard)." hardness entries found."."<br />"."\n";
                    echo "<ul>"."\n";
                    while ($s_hard = mysqli_fetch_assoc($res_hard)) {
                        echo "<li>".$s_hard["type"]."</li>";
                    }
                    echo "</ul>"."\n";
                    echo "<a href=\"add.php?table=hardness\">Add new entry</a>";
                    echo "<hr>";
                    // Get options
                    echo "<h4>Options</h4>"."\n";
                    $sql_options = "SELECT * FROM options";
                    $res_options = $connection->query($sql_options);
                    echo mysqli_num_rows($res_options)." options entries found."."<br />"."\n";
                    echo "<ul>"."\n";
                    while ($s_options = mysqli_fetch_assoc($res_options)) {
                        echo "<li>".$s_options["type"]."</li>";
                    }
                    echo "</ul>"."\n";
                    echo "<a href=\"add.php?table=options\">Add new entry</a>";

                    mysqli_close();
                }
                else echo "Database connection error";
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
