<?php
    require_once('helpers.php');
    /**
     * Set a cookie for tracking the last visit.
     *
     * @return None
     */
    function lastVisit($name, $expire) {
        $value = getDateDMY()." - ".getTimeHM();
        setcookie($name, $value, time() + $expire, '/', $_SERVER['SERVER_NAME'], true, true);
    }
?>
