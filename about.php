<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webshop Pencil AG für Bleistifte">
    <meta name="author" content="Fabian Affolter">
    <title>Webshop Pencil AG | About</title>

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
            <?php 
                include('menu.php');
                echo menu();
            ?>
    <!-- Header -->
    <!-- Content -->
        <?php
            $str = file_get_contents("company.txt");
            echo $str;
        ?>
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
