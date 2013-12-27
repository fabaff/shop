<?php
    require_once('../config/dbconnect.php');

    $username = $_POST['username'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $email = $_POST['email'];
 
    if($password1 != $password2) {
        header('Location: ../register.php');
    }

    if(strlen($username) > 30) {
        header('Location: ../register.php');
    }
 
    $hash = hash('sha256', $password1);
     
    function createSalt() {
        $text = md5(uniqid(rand(), true));
        return substr($text, 0, 3);
    }
     
    $salt = createSalt();
    $password = hash('sha256', $salt.$hash);
    
    $username = $connection->real_escape_string($username);
    
    $query = "INSERT INTO users ( username, password, email, salt ) VALUES
        ( '$username', '$password', '$email', '$salt' )";
    
    $connection->query($query);
    $connection->close();
    header('Location: ../admin.php');
?>
