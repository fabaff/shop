<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webshop Pencil AG für Bleistifte">
    <meta name="author" content="Fabian Affolter">
    <title>Webshop Pencil AG | Login</title>

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
            <h3>Login for Administration area</h3>

			<form action="scripts/login-process.php" class="form-horizontal well" method="post">
			<fieldset>
				 <div class="rows">
					<div class="col-xs-8">
					<div class="form-group">
					<div class="rows">
						<div class="col-md-8">
							<div class="col-lg-6">
								<input class="form-control" id="username" name="username" placeholder="User name" type="text">
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="rows">
						<div class="col-md-8">
							<div class="col-lg-6">
								<input class="form-control" id="password" name="password" placeholder="Password" type="password">
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="rows">
						<div class="col-md-8">
							<div class="col-lg-12">
								<button class="btn btn-success" type="submit">Login</button>
							</div>
						</div>
					</div>
				</div>
				
				</div>
					
				</div>	
				</fieldset>
			</form>
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
