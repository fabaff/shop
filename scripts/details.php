<?php
    $values = array(array('Server name', $_SERVER['SERVER_NAME']),
                    array('Server software', $_SERVER['SERVER_SOFTWARE']),
                    array('CGI', $_SERVER['GATEWAY_INTERFACE']),
                    array('Server protocol', $_SERVER['SERVER_PROTOCOL']),
                    array('Server port', $_SERVER['SERVER_PORT']),
                    array('Remote host', $_SERVER['REMOTE_HOST']),
                    array('Remote user', $_SERVER['REMOTE_USER']),
                    array('Remote address', $_SERVER['REMOTE_ADDR'])
             );

    echo "<div style=\"float: right; width: 300px; margin: 25px; padding: 25px; border: 1px solid black;\">"."\n";
    foreach ($values as $entries) {
        echo "<b>".$entries[0]."</b>  ".$entries[1]."<br/>"."\n";
    }
    echo "</div>"."\n";
?>
