<?php
	session_start();

	// If the user is not logged in, ohterwise send the user to the login page
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
    <title>Webshop Pencil AG | Sessions</title>

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
        <h3>Sessions</h3>
        <p>This site is protected. If you can read this, your session is running.</p>
        <h3>Session variables</h3>
        <p>The following variables are available in $_SESSION.</p>
        <?php 
            if(!empty($_SESSION)) {
                foreach($_SESSION as $key => $value) {
                    echo "<p>".$key." : ".$value."</p>";
                }
            } else {
                echo 'There are no session variables available.';
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
