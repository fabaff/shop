<?php
    require_once('../config/dbconnect.php');
    require_once('helpers.php');
    //Get the parameters
    $pname = $_POST['pname'];
    $pdesc = $_POST['pdesc'];
    $ptype = $_POST['ptype'];
    $poption = $_POST['poption'];
    $color = $_POST['color'];
    $hardness = $_POST['hardness'];
    $price = $_POST['price'];
    $adate = getDateYMD();

    $table = 'products';

    // Create SQLquery
    $query = "INSERT INTO $table (`id`, `pname`, `pdesc`, `ptype`, `poption`, `color`, `hardness`, `price`, `adate`) VALUES ( NULL, '$pname', '$pdesc', $ptype, $poption, $color, $hardness, $price, '$adate')";
    //Run query and redirect to admin page
    if ($connection->query($query)) {
        echo "<script type=\"text/javascript\">
                  alert(\"New product '$pname' added successfully.\");
                  window.location = \"../admin.php\"
              </script>";
    } else {
        die("Failed: ".mysqli_error());
    }
    $connection->close();
?>
