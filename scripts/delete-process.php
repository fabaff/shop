<?php
    require_once('../config/dbconnect.php');

    // Get the parameters
    $entry = $_POST['id'];
    $table = $_POST['table'];
    // Create SQL query
    $query = "DELETE FROM $table WHERE id='$entry'";

    if ($connection->query($query)) {
        echo "<script type=\"text/javascript\">
                  alert(\"New entry $entry deleted successfully.\");
                  window.location = \"../tables.php\"
              </script>";
    } else {
        die("Failed: ".mysqli_error());
    }
    $connection->close();
?>
