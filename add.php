<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webshop Pencil AG für Bleistifte">
    <meta name="author" content="Fabian Affolter">
    <title>Webshop Pencil AG | Add entry</title>

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
                
                $table = $_GET["table"];

                echo "<h3>Add entry to table '".$table."'</h3>"."\n";
                // Create SQl statement
                $sql = "SELECT * FROM $table";
                // Get entries from table
                $result = $connection->query($sql);
                // Count rows
                echo mysqli_num_rows($result)." entries in ".$table." found."."<br />"."\n";
                // Displays rows
                echo "<ul>"."\n";
                while ($s_results = mysqli_fetch_assoc($result)) {
                    echo "<li>".$s_results["type"]."</li>";
                }
                echo "</ul>"."\n";
                $connection->close();
            
            $form = "
            <form name=\"add\" action=\"scripts/add-process.php\" method=\"post\">
            <table width=\"510\" border=\"0\">
            <tr>
                <td colspan=\"2\"></td>
            </tr>
            <tr>
                <td>Entry:</td>
                <td><input class=\"form-control\" type=\"text\" name=\"entry\" maxlength=\"20\" /></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><button class=\"btn btn-default\" type=\"submit\" value=\"Add\">Add entry</button></td>
            </tr>
            </table>
                <input type=\"hidden\" name=\"table\" value=\"$table\"/>
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
