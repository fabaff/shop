<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webshop Pencil AG für Bleistifte">
    <meta name="author" content="Fabian Affolter">
    <title>Webshop Pencil AG | Edit entry</title>

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
            <?php
                require_once('config/dbconnect.php');
                
                $table = $_POST["table"];
                $entry = $_POST["id"];

                // Create SQl statement
                $sql = "SELECT * FROM $table WHERE id='$entry'";
                // Get entries from table
                $results = $connection->query($sql);
                $id = 0;
                $type = "";
                // Get row entry
                while ($result = $results->fetch_object()) {
                    $id = $result->id;
                    $type = $result->type;
                }
                echo "<h3>Edit entry (".$type.", ID ".$entry.") in table '".$table."'</h3>"."\n";
                $connection->close();
            
            $form = "
            <form name=\"add\" action=\"scripts/edit-process.php\" method=\"POST\">
            <table width=\"510\" border=\"0\">
            <tr>
                <td colspan=\"2\"></td>
            </tr>
            <tr>
                <td>Content:</td>
                <td><input class=\"form-control\" type=\"text\" name=\"entry\" value=\"$type\" maxlength=\"20\" /></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><button class=\"btn btn-default\" type=\"submit\" value=\"Update\">Update entry</button></td>
            </tr>
            </table>
                <input type=\"hidden\" name=\"table\" value=\"$table\"/>
                <input type=\"hidden\" name=\"id\" value=\"$id\"/>
            </form>";
            echo $form."\n";
        ?>
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
