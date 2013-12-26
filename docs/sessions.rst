.. 

Sessions
========



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

Shopping Cart
-------------


User Accounts
-------------
