<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webshop Pencil AG für Bleistifte">
    <meta name="author" content="Fabian Affolter">
    <title>Webshop Pencil AG | Anmeldung</title>

    <link href="css/webshop.css" rel="stylesheet">
  </head>

  <body>
    <div class="container" style="margin-top: 10px;">
    <!-- Header -->
      <div class="panel panel-default">
        <div class="panel-body">
        <!-- Logo and company name -->
            <?php 
                require('header.php');
                echo head();
            ?>
        <!-- Navigation -->
            <?php 
                require('menu.php');
                echo menu();
            ?>
    <!-- Header -->

    <!-- Content -->
        <!-- Selected products -->
        <div>
            <h3>Erstellen von Benutzern</h3>

            <form name="register" action="register-process.php" method="post">
            <table width="510" border="0">
            <tr>
            <td colspan="2"></td>
            </tr>
            <tr>
            <td>Benutzername:</td>
            <td><input class="form-control input-lg" type="text" name="username" maxlength="20" /></td>
            </tr>
            <tr>
            <td>Passwort:</td>
            <td><input class="form-control input-lg" type="password" name="password1" /></td>
            </tr>
            <tr>
            <td>Bestätigung Passwort:</td>
            <td><input class="form-control input-lg" type="password" name="password2" /></td>
            </tr>
            <tr>
            <td>E-Mail:</td>
            <td><input class="form-control input-lg" type="text" name="email" id="email" /></td>
            </tr>
            <tr>
            <td>&nbsp;</td>
            <td><button class="btn btn-success btn-lg" type="submit" value="Register">Registrieren</button></td>
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
        require('footer.php');
        echo foot();
    ?>
    <!-- Footer -->
  </body>
</html>
