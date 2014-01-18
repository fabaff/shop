<?php
	session_start();
    require_once('config/dbconnect.php');
    require_once('scripts/helpers.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webshop Pencil AG for Bleistifte">
    <meta name="author" content="Fabian Affolter">
    <title>Webshop Pencil AG | Products</title>

    <link href="css/webshop.css" rel="stylesheet">
    <!-- Based on http://www.w3schools.com/ajax/ajax_database.asp -->
    <script language="javascript">
        function showPencils(color) {
            if (color == "") {
                document.getElementById("pencils").innerHTML = "";
                return;
            }
            if (window.XMLHttpRequest) {
                xmlhttp=new XMLHttpRequest();
            } else {
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("pencils").innerHTML=xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "scripts/get-products.php?id=" + color, true);
            xmlhttp.send();
        }
    </script>
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
           <?php
                colorControl();
            ?>

<!--        <table class="table table-striped">
            <thead valign="bottom">
            <tr>
            <?php
                $heading = array('Type', 'Optionen', 'Farbe', 'Härte', 'Preis CHF');
                foreach ($heading as $element) {
                    echo '<th class="head">'.$element.'</th>'."\n";
                }
            ?>
            </tr>
            </thead>
            <tbody valign="top">
            <?php
                $products = array(array('Bleistift', 'keine', 'rot', 'HB', '1'),
                                  array('Bleistift', 'keine', 'rot', 'B', '1'),
                                  array('Bleistift', 'keine', 'rot', '2B', '1',),
                                  array('Bleistift', 'keine', 'gelb', 'F', '1.2'),
                                  array('Bleistift', 'keine', 'gelb', 'H', '1.2'),
                                  array('Bleistift', 'keine', 'gelb', '2H', '1.2')
                            );
                foreach ($products as $product => $details) {
                    echo "<tr>"."\n";
                    foreach ($details as $detail) {
                        echo "<td>".$detail."</td>"."\n";
                    }
                    echo "<td>"."\n";
                    echo "<form action='product.php' method='get' name='pencil'>"."\n";
                    echo "<input type='hidden' name='type' value='$details[0]'/>"."\n";
                    echo "<input type='hidden' name='options' value='$details[1]'/>"."\n";
                    echo "<input type='hidden' name='color' value='$details[2]'/>"."\n";
                    echo "<input type='hidden' name='hardness' value='$details[3]'/>"."\n";
                    echo "<input type='hidden' name='price' value='$details[4]'/>"."\n";
                    echo "<input type='submit' class='btn btn-default' value='Kauf mich'/>"."\n";
                    echo "</form>"."\n";
                    echo "</td>"."\n";
                    echo "</tr>"."\n";
                }
            ?>
            </tbody>
            </table>
-->
            <div id="pencils" class="row">
            <?php
                if ($connection->connect_errno == 0) {
                    $sql = "SELECT * FROM products";
                    $results = $connection->query($sql);
                    while ($result = $results->fetch_object()) {
                        echo "<div class=\"col-6 col-sm-6 col-lg-4\">"."\n";
                        echo "<h4>".$result->pname."</h4>"."\n";
                        // Execute the second SQL query to get the color. Speed difference
                        // to JOIN or only style question?
                        $sql_color = "SELECT * FROM colors WHERE id=$result->color";
                        $result_color = $connection->query($sql_color);
                        $color = $result_color->fetch_object()->type;
                        echo getImage($color);
                        echo "<p><a class=\"btn btn-xs btn-default\" href=\"product.php?id=$result->id\" role=\"button\">View details</a> &nbsp;"."\n";
                        echo "<a class=\"btn btn-xs btn-default\" href=\"cart.php?artID=$result->id&qty=1\" role=\"button\">Add to cart</a></p>"."\n";
                        echo "</div>"."\n";
                    }
                    //echo "</div>"."\n";
                    // Create table for displaying data, not very nice
                    /*echo "<table class=\"table table-striped\">"."\n";
                    echo "<thead valign=\"bottom\">"."\n";
                    echo "<tr>"."\n";
                    foreach ($tableinfo as $element) {
                        echo "<th class=\"head\">".ucfirst($element->name)."</th>"."\n";
                    }
                    echo "<th class=\"head\">  </th>"."\n";
                    echo "</tr>"."\n";
                    echo "</thead>"."\n";
                    echo "<tbody valign=\"top\">"."\n";
                    while ($result = $results->fetch_object()) {
                        echo "<tr>"."\n";
                        echo "<td>".$result->pname."</td>";
                        echo "<td>".$result->ptype."</td>";
                        echo "<td>".$result->poption."</td>";
                        echo "<td>".$result->color;
                        $sql_color = "SELECT * FROM colors WHERE id=$result->color";
                        $result_color = $connection->query($sql_color);
                        $color = $result_color->fetch_object()->type;
                        switch($color) {
                            case black:
                                echo "<img src=\"images/black.png\" alt=\"Pencil\"></img>"."</td>";
                                break;
                            case blue:
                                echo "<img src=\"images/blue.png\" alt=\"Pencil\"></img>"."</td>";
                                break;
                            case red:
                                echo "<img src=\"images/red.png\" alt=\"Pencil\"></img>"."</td>";
                                break;
                            case white:
                                echo "<img src=\"images/white.png\" alt=\"Pencil\"></img>"."</td>";
                                break;
                            default:
                                echo "<img src=\"images/default.png\" alt=\"Pencil\"></img>"."</td>";
                                break;
                        }
                        $result_color->close();
                        echo "<td>".$result->hardness."</td>";
                        echo "<td>".$result->price."</td>";
                        echo "<td>".$result->adate."</td>";
                        echo "<td>"."<a href=\"$result->id\">Edit me</a>"."</td>";
                        echo "<td>"."<a href=\"scripts/add-cart-process.php?id=$result->id&name=$result->pname\">Add me</a>"."</td>";
                        echo "</tr>"."\n";
                    }
                    echo "</tbody>"."\n";
                    echo "</table>"."\n";*/
                    $results->close();
                } else {
                    echo "Database connection error";
                }
                $connection->close();
            ?>
            </div>
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
