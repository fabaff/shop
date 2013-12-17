<?php
    require_once('../config/dbconnect.php');

    $lname     = $_POST['lname'];
    $fname     = $_POST['fname'];
    $email     = $_POST['email'];
    $reemail   = $_POST['reemail'];
    $password  = sha1($_POST['password']);
    $month     = $_POST['month'];
    $day       = $_POST['day'];
    $year      = $_POST['year'];
    $gender    = $_POST['optionsRadios'];
    $birthdate = $year.'-'.$month.'-'.$day;

    $query = "INSERT INTO customers (id, lname, fname, email, password, birthdate, gender) 
        VALUES (NULL, '$lname', '$fname', '$email', '$password', '$birthdate', '$gender')";

    if ($connection->query($query)) {
            header('Location: ../index.php');
    } else {
        die("Failed: ".mysqli_error());
    }
    $connection->close();
?>
