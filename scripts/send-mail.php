<?php
    // SE Linux is the show stopper here...check the host's configuration
    //  setsebool -P httpd_can_network_connect=1
    //  setsebool -P httpd_can_sendmail=1
    function sendMail() {
        $to = "root@Localhost";
        $subj = "Hello";
        $mess = "Hi Customer,\nYour order will be shipped soon!\nPencil Webshop";
        $from = "From:webshop@pencil.webshop";

        mail($to, $subj, $mess, $from."\r\n");
    }
?>
