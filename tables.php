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
            <h3>Overview Table content</h3>
            <!-- This page is more or less a simple test page for the database connection. -->
            <!-- Keep in mind: The connection details are only in this page included (-> dbconnect.php). -->
            <?php
                $connection = new mysqli("localhost", "root", "webshop", "webshop");
                if (mysqli_connect_errno() == 0) {
                    $sections = array('pencils', 'colors', 'hardness', 'options');
                    foreach ($sections as $section) {
                        echo "<h4>".ucfirst($section)."</h4>"."\n";
                        $sql = "SELECT * FROM $section";
                        $results = $connection->query($sql);
                        echo mysqli_num_rows($results)." ".$section." entries found."."<br />"."\n";
                        echo "<ul>"."\n";
                        while ($result = $results->fetch_object()) {
                            echo "<li>".$result->type."</li>";
                        }
                        echo "</ul>"."\n";
                        echo "<a href=\"add.php?table=$section\">Add new entry</a>";
                    }
                } else {
                    echo "Database connection error";
                }
                $results->close();
                $connection->close();
            ?>
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
