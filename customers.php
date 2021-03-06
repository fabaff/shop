<?php
	session_start();

	// Allow acces only if the user is logged in, ohterwise send the user to
    // the login page
	if ($_SESSION["SESSION_ADMIN"] != "YES") {
	  header("Location: login.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webshop Pencil AG für Bleistifte">
    <meta name="author" content="Fabian Affolter">
    <title>Webshop Pencil AG | Customers</title>

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
            <h3>Overview Customers</h3>
            <?php
                require_once('config/dbconnect.php');
                if (mysqli_connect_errno() == 0) {                  
                    // Get data
                    $sql = "SELECT * FROM customers";
                    $results = $connection->query($sql);
                    $tableinfo = $results->fetch_fields();
                    echo $results->num_rows." customers entries found."."<br />"."\n";
                    // Create table
                    echo "<table class=\"table table-striped\">"."\n";
                    echo "<thead valign=\"bottom\">"."\n";
                    echo "<tr>"."\n";
                    foreach ($tableinfo as $element) {
                        echo "<th class=\"head\">".ucfirst($element->name)."</th>"."\n";
                    }
                    echo "</tr>"."\n";
                    echo "</thead>"."\n";
                    echo "<tbody valign=\"top\">"."\n";
                    while ($result = $results->fetch_object()) {
                        echo "<tr>"."\n";
                        echo "<td>".$result->id."</td>";
                        echo "<td>".$result->username."</td>";
                        echo "<td>".$result->lastname."</td>";
                        echo "<td>".$result->firstname."</td>";
                        echo "<td>".$result->email."</td>";
                        echo "<td>".$result->password."</td>";
                        echo "<td>".$result->birthdate."</td>";
                        echo "<td>".$result->gender."</td>";
                        echo "</tr>"."\n";
                    }
                    echo "</tbody>"."\n";
                    echo "</table>"."\n";
                    $results->close();
                } else {
                    echo "Database connection error";
                }
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
