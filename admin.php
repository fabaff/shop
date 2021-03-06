<?php
	session_start();

    require_once('scripts/send-msg.php');
    defaultMsg("admin", getShortPage());

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
        <?php
            require('scripts/details.php');
        ?>
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
                              'Misc'     => array(array('Messaging', 'send-test-msg.php'),
                                                  array('Cookies', 'cookies.php'),
                                                  array('Sessions', 'sessions.php'),
                                                  array('Localisation', 'l10n.php'),
                                                  array('JSON', 'json.php'),
                                                  array('Graphics', 'graphics.php')
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
