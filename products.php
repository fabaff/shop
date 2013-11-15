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
            <table class="table table-striped">
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
