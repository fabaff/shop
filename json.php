<?php
	session_start();

	// If the user is not logged in, otherwise send the user to the login page
	if ($_SESSION["SESSION_ADMIN"] != "YES") {
	  header("Location: login.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webshop Pencil AG for Pencils">
    <meta name="author" content="Fabian Affolter">
    <title>Webshop Pencil AG | JSON</title>

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
        <h3>JSON</h3>
        <p>The following data were created by the <a href="products.php">Products page</a> in the admin section.</p>
<div class="panel panel-default" style="margin: 10px; padding: 10px; border: 1px solid black;">
        <?php 
            $json = file_get_contents('pencils.json');
            // Decode the json
            print_r(json_decode($json));
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
