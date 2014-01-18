<?php
	include("scripts/ShoppingCart.php");
	session_start();
	if (!isset($_SESSION["cart"])) {
		$_SESSION["cart"] = new ShoppingCart;
    }
	if (isset($_GET["artID"]) && isset($_GET["qty"])) {
		$_SESSION["cart"]->addItem($_GET["artID"],$_GET["qty"]);
    }
	if (isset($_GET["artRemoveAll"])) {
		$_SESSION["cart"]->removeItemAll($_GET["artRemoveAll"], 1);
	}
	if (isset($_GET["artChangeQty"])) 	{
		$_SESSION["cart"]->changeItemQty($_GET["artChangeQty"], $_GET["artQty"]);
	}
	if (isset($_GET["plus"])) {
		$_SESSION["cart"]->changeItemOne($_GET["artChangeQty"], 1);
	}
	if (isset($_GET["minus"])) {
		$_SESSION["cart"]->changeItemOne($_GET["artChangeQty"], -1);
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webshop Pencil AG for Pencils">
    <meta name="author" content="Fabian Affolter">
    <title>Webshop Pencil AG | Shopping cart</title>

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
        <h3>Shopping cart</h3>
        <p>The following products are already in your shopping cart.</p>
	<?php $_SESSION["cart"]->display(); ?>
	<br/>
	<a href="overview-products.php" class="btn btn-default"><- Do some more shopping...</a>
	<a href="terms.php" class="btn btn-default">Terms and conditions</a>
	<a href="billing.php" class="btn btn-default">Go on with the checkout process... -></a>

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

