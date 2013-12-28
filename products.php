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
            <?php
                require_once('config/dbconnect.php');
                if (mysqli_connect_errno() == 0) {                  
                    // Get data
                    $sql = "SELECT * FROM products";
                    $results = $connection->query($sql);
                    $tableinfo = $results->fetch_fields();
                    echo $results->num_rows." products entries found."."<br />"."\n";
                    // Create table
                    echo "<table class=\"table table-striped\">"."\n";
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
                        echo "<td>".$result->id."</td>";
                        echo "<td>".$result->pname."</td>";
                        echo "<td>".$result->ptype."</td>";
                        echo "<td>".$result->poption."</td>";
                        echo "<td>".$result->color."</td>";
                        echo "<td>".$result->hardness."</td>";
                        echo "<td>".$result->price."</td>";
                        echo "<td>".$result->adate."</td>";
                        echo "<td>"."<a href=\"$result->id\">Edit me</a>"."</td>";
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
