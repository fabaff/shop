<?php
    // Get the whole variable array
    //print_r($_SERVER);
    $server = array(array('Server name', $_SERVER['SERVER_NAME']),
                    array('Server software', $_SERVER['SERVER_SOFTWARE']),
                    array('Operating system', PHP_OS),
                    array('CGI', $_SERVER['GATEWAY_INTERFACE']),
                    array('Server protocol', $_SERVER['SERVER_PROTOCOL']),
                    array('Server port', $_SERVER['SERVER_PORT']),
                    array('Path', $_SERVER['PATH']),
                    array('Add. details', php_uname())
             );
    $client = array(array('Remote address', $_SERVER['REMOTE_ADDR']),
                    array('User agent', $_SERVER['HTTP_USER_AGENT']),
                    array('HTTP accept', $_SERVER['HTTP_ACCEPT']),
                    array('Language', $_SERVER['HTTP_ACCEPT_LANGUAGE'])
             );

    echo "<div class=\"panel panel-default\" style=\"float: right; width: 400px; margin: 10px; padding: 10px; border: 1px solid black;\">"."\n";
    echo "<h4>"."System details"."</h4>"."\n";
    foreach ($server as $entries) {
        echo "<b>".$entries[0]."</b>  ".$entries[1]."<br/>"."\n";
    }
    echo "<h4>"."Client details"."</h4>"."\n";
    foreach ($client as $entries) {
        echo "<b>".$entries[0]."</b>  ".$entries[1]."<br/>"."\n";
    }
    echo "</div>"."\n";
?>
