<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webshop Pencil AG für Bleistifte">
    <meta name="author" content="Fabian Affolter">
    <title>Webshop Pencil AG | Kunden</title>

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
        <!-- Selected products -->
        <div>
            <h3>Overview Customers</h3>
            <?php
                require_once('config/dbconnect.php');
                if (mysqli_connect_errno() == 0) {                  
                    // Get data
                    $sql = "SELECT * FROM customers";
                    $results = $connection->query($sql);
                    echo mysqli_num_rows($results)." customers entries found."."<br />"."\n";
                    echo "<ul>"."\n";
                    while ($result = $results->fetch_object()) {
                        echo "<li>".$result->lname."</li>";
                    }
                    echo "</ul>"."\n";
                    $results->close();
                } else {
                    echo "Database connection error";
                }
                $connection->close();
            ?>
        </div>
        <!-- Selected products -->
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
