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

    <script language="javascript">
        function setBG() {
            if (document.forms["login"]["username"].style.backgroundColor = "#FF9999") {
                document.forms["login"]["username"].style.backgroundColor = "";
            }

            if (document.forms["login"]["password"].style.backgroundColor = "#FF9999") {
                document.forms["login"]["password"].style.backgroundColor = "";
                }
        }

        function setFocus() {
            document.forms["login"]["username"].focus();
        }

        function validateForm() {
            var username = document.forms["login"]["username"].value;
            if (username == null || username == "") {
                document.forms["login"]["username"].style.backgroundColor = "#FF9999";
                document.forms["login"]["username"].placeholder = "Please, your username!";
                document.forms["login"]["username"].focus();
                return false;
            }
            var password = document.forms["login"]["password"].value;
            if (password == null || password == "") {
                document.forms["login"]["password"].style.backgroundColor = "#FF9999";
                document.forms["login"]["password"].placeholder = "Please, your password!";
                document.forms["login"]["password"].focus();
                return false;
            }
	        return true;
        }
    </script>

  </head>

  <body onload="setFocus()">
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

			<form action="scripts/login-process.php" name="login" onsubmit="return validateForm()" class="form-horizontal well" method="POST">
			<fieldset>
			    <div class="rows">
					<div class="col-md-8">
					<div class="form-group">
					<div class="rows">
						<div class="col-md-8">
                            <label for="username">Username</label>
                            <input class="form-control" id="username" name="username" placeholder="User name" type="text" onkeyup="setBG()" />
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="rows">
						<div class="col-md-8">
                            <label for="password">Password</label>
                            <input class="form-control" id="password" name="password" placeholder="Password" type="password" onkeyup="setBG()" />
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="rows">
						<div class="col-md-8">
						    <button id="loging" class="btn btn-default" type="submit">Login</button>
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
