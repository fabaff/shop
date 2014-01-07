<?php
    ob_start();
    session_start();
 
    require_once('../config/dbconnect.php');

    $username = $_POST['username'];
    $password = $_POST['password'];
    $salt = "";
    $dbpassword = "";

    /* A simple solution with hard-coded credentials
	// Check if username and password are correct
	if ($_POST["username"] == "admin" && $_POST["password"] == "admin") {
	    // If correct, we set the session to YES
        session_start();
        $_SESSION["SESSION_ADMIN"] = "YES";
        header('Location: ../admin.php');
	} else {
	// If not correct, we set the session to NO
        session_start();
        $_SESSION["SESSION_ADMIN"] = "NO";
        header('Location: ../login.php');
	}
    */
    // Based on http://www.sourcecodetuts.com/php/27/how-create-login-page-php-and-mysql-session
    // Clean the username
    $username = $connection->real_escape_string($username);

    $sql = "SELECT id, password, email, salt
                FROM users
                WHERE username = '$username' LIMIT 1;";

    //if ($connection->query($sql)) {
    //    echo "Query successfully executed.";
    //} else {
    //    echo "There was an issue." ;
    //}

    $result = $connection->query($sql);
    // If user is not found, redirect to login page
    if ($result->num_rows == 0) {
        //echo "User not found";
        header('Location: ../login.php');
    }

    while ($entry = $result->fetch_object()) {
        $dbpassword = $entry->password;
        $salt = $entry->salt;
    }
    $result->close();

    $hash = hash('sha256', $salt.hash('sha256', $password));

    // Incorrect password, redirect to login page
    if ($hash != $dbpassword) {
        //echo "Password doesn't match";
       header('Location: ../login.php');
    // Redirect to admin page after successful login
    } else {
        //echo "Password is a match";
        header('Location: ../admin.php');
        $_SESSION["SESSION_ADMIN"] = "YES";
    }
?>
