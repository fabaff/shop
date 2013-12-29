.. 

Cookies and Sessions
====================
The built-in support for sessions in PHP is handling all cookie manipulation
to provide persistent variables that are accessible from different pages and
across multiple visits to the site.

Cookies
-------
A cookie is used to track the last time a visitor check the front page. The 
cookie is set when a visitor arrives::

    function lastVisit($name, $expire) {
        $value = getDateDMY()." - ".getTimeHM();
        setcookie($name, $value, time() + $expire, '/', $_SERVER['SERVER_NAME'], true, true);
    }

In the footer of the index page the details are presented::

    <?php 
     if(isset($_COOKIE['LastVisit'])) { 
        $last = $_COOKIE['LastVisit']; 
        echo "You last visited us on ".$last; 
     } else { 
        echo "This is your first visit."; 
     } 
    ?>

Hit counter
-----------
As a simple show case for PHP sessions a hit counter for the front page is
available. ::

    <?php
	    session_start();
        $_SESSION['hits'] = $_SESSION['hits'] + 1;
    ?>

Included in the footer it shous the users the total of visits::

    echo " Total ".$_SESSION['hits']." visits of this page.";

Language selection
------------------


User Accounts
-------------
