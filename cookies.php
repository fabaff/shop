<?php
    setcookie("checked", "yes", time() + 10, "/", $_SERVER['SERVER_NAME'], true, true);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webshop Pencil AG für Bleistifte">
    <meta name="author" content="Fabian Affolter">
    <title>Webshop Pencil AG | Cookies</title>

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
            <h3>Cookies</h3>
            <h4>Check Browser-Support</h4>
            <p>
            <?php
                if (isset($_COOKIE['checked'])) {
                    echo "You have been on this page in the last 10 s.";
                } else {
                    echo "You have not been on this page in the last 10 s.";
                }
            ?>
            </p>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>">Reload</a>
            <h4>Read all cookies and their values</h4>
            <?php
                foreach($_COOKIE as $key => $value) {
                    echo "<p>".$key." : ".$value."</p>";
                }
            ?>
            <h4>Delete cookie</h4>
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
