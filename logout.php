<?php
    ob_clean();
    session_start();

    if (session_id() != "" || isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 1, '/');
    }
    // Unset session
    session_unset();
    // Destroy the current user session
    session_destroy();
    // Clean the session data
    $_SESSION = array();

    header('Location: index.php');
    session_start();
?>
