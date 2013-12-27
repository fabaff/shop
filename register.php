<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webshop Pencil AG für Bleistifte">
    <meta name="author" content="Fabian Affolter">
    <title>Webshop Pencil AG | Registration</title>

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
        <!-- Selected products -->
        <div>
            <h3>Register a new user</h3>

            <form name="register" action="scripts/register-process.php" method="post">
            <table width="510" border="0">
            <tr>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td>User name:</td>
                <td><input class="form-control" type="text" name="username" maxlength="20" /></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input class="form-control" type="password" name="password1" /></td>
            </tr>
            <tr>
                <td>Password again:</td>
                <td><input class="form-control" type="password" name="password2" /></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input class="form-control" type="text" name="email" id="email" /></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><button class="btn btn-success" type="submit" value="Register">Register</button></td>
            </tr>
            </table>
            </form>
        </div>
        <!-- Selected products -->
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
