<?php
    require_once('../config/dbconnect.php');

    // Get the parameters
    $entry = $_POST['entry'];
    $table = $_POST['table'];
    // Create SQL query
    $query = "INSERT INTO $table ( id, type ) VALUES ( NULL, '$entry' )";
    // Run query and redirect to admin page
    if ($connection->query($query)) {
        echo "<script type=\"text/javascript\">
                  alert(\"New entry $entry added successfully.\");
                  window.location = \"../admin.php\"
              </script>";
    } else {
        die("Failed: ".mysqli_error());
    }
    $connection->close();
?>
