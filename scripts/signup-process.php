<?php
    require_once('../config/dbconnect.php');

    $username  = $_POST['username'];
    $lastname  = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $email     = $_POST['email'];
    $reemail   = $_POST['reemail'];
    $password  = sha1($_POST['password']);
    $month     = $_POST['month'];
    $day       = $_POST['day'];
    $year      = $_POST['year'];
    $gender    = $_POST['optionsRadios'];
    $birthdate = $year.'-'.$month.'-'.$day;

    $query = "INSERT INTO customers (id, username, lastname, firstname, email, password, birthdate, gender) 
        VALUES (NULL, '$username', '$lastname', '$firstname', '$email', '$password', '$birthdate', '$gender')";

    if ($connection->query($query)) {
            header('Location: ../checkout.php');
    } else {
        die("Failed: ".mysqli_error());
    }
    $connection->close();
?>
