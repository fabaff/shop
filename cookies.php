<?php
    setcookie("Check", "yes", time() + 10, "/", $_SERVER['SERVER_NAME'], true, true);
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
                if (isset($_COOKIE['Check'])) {
                    echo "You have been on this page in the last 10 s.";
                } else {
                    echo "You have not been on this page in the last 10 s.";
                }
            ?>
            </p>
            <a class="btn btn-link" href="<?php echo $_SERVER['PHP_SELF']; ?>">Check it.</a>
            <h4>Read all cookies and their values</h4>
            <?php
                if(!empty($_COOKIE)) {
                    foreach($_COOKIE as $key => $value) {
                        echo "<p>".$key." : ".$value."</p>";
                    }
                } else {
                    echo 'There are no cookies configured for this website so far.';
                }
            ?>
            <!-- <h4>Delete cookie</h4> -->
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
