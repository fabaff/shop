<?php 
    require_once('scripts/send-msg.php');
    defaultMsg("admin", getShortPage());
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webshop Pencil AG für Bleistifte">
    <meta name="author" content="Fabian Affolter">
    <title>Webshop Pencil AG | Administration</title>

    <link href="css/webshop.css" rel="stylesheet">
  </head>

  <body>
    <div class="container" style="margin-top: 10px;">
    <!-- Header -->
      <div class="panel panel-default">
        <div class="panel-body">
        <!-- Logo and company name -->
            <?php
                ob_start();
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
        <h3>Administration</h3>
            <?php
                $part1 = "<p>\n";
                $part2 = '';
                $part3 = "</p>\n";
                // Menu array
                $menu = array('Products' => array(array('Show all tables', 'tables.php'),
                                                  array('Show products', 'products.php'),
                                                  array('Add products', 'add-product.php'),
                                                  ),
                              'CRM' => array(array('Show customers', 'customers.php')
                                                   ),
                              'Database' => array(array('Show users', 'users.php'),
                                                  array('Register new users', 'register.php')
                                                        ),
                              'Misc'     => array(array('Test MQTT messaging', 'send-test-msg.php'),
                                                  array('Cookies', 'cookies.php'),
                                                  array('Sessions', 'sessions.php'),
                                                  array('Localisation', 'l10n.php')
                                                  )
                    );
                    foreach ($menu as $section => $elements) {
                        echo "<h4>".$section."</h4>";
                        foreach ($elements as $element) {
                            echo "<a href='".$element[1]."'>".$element[0]."</a>"."\n";
                            echo"<br/>";
                        }
                    }
            ?>
<?php

echo $_SERVER['SERVER_NAME'];
echo $_SERVER['SERVER_SOFTWARE'];
echo $_SERVER['GATEWAY_INTERFACE'];
echo $_SERVER['SERVER_PROTOCOL'];
echo $_SERVER['SERVER_PORT'];
echo $_SERVER['REMOTE_HOST'];
echo $_SERVER['REMOTE_ADDR'];
?>

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
