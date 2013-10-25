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
          <div>
            <a class="brand-logo" href="index.html"></a>
            <p class="brand-name">Webshop Pencil AG</p>
          </div>
        <!-- Navigation -->
        <ul class="nav nav-tabs">
        <?php
            // Menu array with page title and assigned file
            $menu = array('Home' => 'index.php',
                          'Produkte' => 'products.php', 
                          'Über uns' => 'about.php'
                );
            foreach ($menu as $label => $link) {
                // For the CSS only the file name without / is needed
                $url = trim($_SERVER['PHP_SELF'], '/');
                if ($link == $url) {
                    echo '<li class="active"><a href="', $link, '">', $label, '</a></li>';
                } else {
                    echo '<li class=""><a href="', $link, '">', $label, '</a></li>';    
                }
            }
        ?>
        <!-- Old static menu
          <li class="active"><a href="index.php">Home</a></li>
          <li class=""><a href="products.php">Produkte</a></li>
          <li class=""><a href="#">Über uns</a></li>
        -->
        </ul>
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
            <p>Hier hat es zufällige Produkte...Die Bleistifte und deren Freunde...</p>
        </div>
        <!-- Selected products -->

        <!-- Content -->
        </div>
      </div>
    </div>

    <!-- Footer -->
    <div class="footer">
      <p>&copy; Pencil AG <?php echo date("Y") ?></p>
    </div>
    <!-- Footer -->
  </body>
</html>
