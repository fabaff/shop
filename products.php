<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webshop Pencil AG für Bleistifte">
    <meta name="author" content="Fabian Affolter">
    <title>Webshop Pencil AG | Home</title>

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
        <!-- Breadcrumb not really needed the site is flat.
        <ol class="breadcrumb">
          <li><a href="#">Ebene 1</a></li>
          <li><a href="#">Ebene 2</a></li>
          <li><a href="#">Ebene 3</a></li>
        </ol>-->
    <!-- Header -->

    <!-- Content -->
        <!-- Action container aka Jumbotron Bootstrap
        <div class="action">
          <h1>Wochen-Aktion</h1>
          <p>Dies ist eine super Aktion. 10 Bleistifte für CHF 8.</p>
        </div>
        Action container -->

        <!-- Selected products -->
        <div>
            <table class="table table-striped">
            <thead valign="bottom">
            <tr>
            <?php
                $heading = array('Type', 'Variant', 'Color', 'Hardness', 'Price CHF');
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
                    echo "<tr>";
                    foreach ($details as $detail) {
                        echo "<td>".$detail."</td>";
                    }
                    echo "</tr>";
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
