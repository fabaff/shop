<?php
    require_once('../config/dbconnect.php');

    // Get the parameters
    $entry = $_POST['entry'];
    $table = $_POST['table'];
    $id = $_POST['id'];

    // Create SQL query
    $query = "UPDATE $table SET `type`='$entry' WHERE id=$id";
    // Run query and redirect to admin page
    if ($connection->query($query)) {
        echo "<script type=\"text/javascript\">
                  alert(\"Entry $entry successfully updated.\");
                  window.location = \"../tables.php\"
              </script>";
    } else {
        die("Failed: ".mysqli_error());
    }
    $connection->close();
?>
