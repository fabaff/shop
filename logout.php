<?php
    session_start();

    if (session_id() != "" || isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 1, '/');
    }
    unset($_SESSION["SESSION_ADMIN"]);
    session_destroy();

    header('Location: index.php');
?>
