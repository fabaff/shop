<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webshop Pencil AG für Bleistifte">
    <meta name="author" content="Fabian Affolter">
    <title>Webshop Pencil AG | Overview test</title>

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
            <h3>Overview Layout test</h3>

        </div>

          <div class="row">
            <div class="col-6 col-sm-6 col-lg-4">
              <h4>Product name</h4>
              <p><img src="images/default.png" alt="Product name" class="img-rounded"></img></p>
              <p><a class="btn btn-default" href="#" role="button">View details</a>
                <a class="btn btn-default" href="#" role="button">Buy it</a></p>
            </div>

          </div><!--/row-->
        </div><!--/span-->
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
