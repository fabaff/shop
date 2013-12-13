//            <?php 
//               require('auth.php');
////           ?>
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
            <h3>Übersicht Kunden</h3>
            <?php
                require_once('config/dbconnect.php');
                if (mysqli_connect_errno() == 0) {                  
                    // Get users
                    $sql_customers = "SELECT * FROM customers";
                    $res_customers = $connection->query($sql_users);
                    echo mysqli_num_rows($res_customers)." customers entries found."."<br />"."\n";
                    echo "<ul>"."\n";
                    while ($s_customers = mysqli_fetch_assoc($res_customers)) {
                        echo "<li>".$s_customers["name"]."</li>";
                    }
                    echo "</ul>"."\n";
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
