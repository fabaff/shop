<?php
    require_once('helpers.php');
    require_once('../config/dbconnect.php');

    $id = intval($_GET['id']);

    if ($connection->connect_errno == 0) {
        // Get data
        $sql = "SELECT * FROM products WHERE color=$id";
        $results = $connection->query($sql);
        while ($result = $results->fetch_object()) {
            echo "<div class=\"col-6 col-sm-6 col-lg-4\">";
            echo "<h4>".$result->pname."</h4>";
            // Execute the second SQL query to get the color. Speed difference
            // to JOIN operation or only style question?
            $sql_color = "SELECT * FROM colors WHERE id=$result->color";
            $result_color = $connection->query($sql_color);
            $color = $result_color->fetch_object()->type;
            echo getImage($color);
            echo "<p><a class=\"btn btn-xs btn-default\" href=\"product.php?id=$result->id\" role=\"button\">View details</a> &nbsp;";
            echo "<a class=\"btn btn-xs btn-default\" href=\"cart.php?artID=$result->id&qty=1\" role=\"button\">Add to cart</a></p>";
            echo "</div>";
        }
        $results->close();
    } else {
        echo "Database connection error";
    }
    $connection->close();
?>
