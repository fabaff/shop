<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webshop Pencil AG für Bleistifte">
    <meta name="author" content="Fabian Affolter">
    <title>Webshop Pencil AG | Home</title>

    <link href="css/webshop.css" rel="stylesheet">
  </head>

  <body>
    <div class="container" style="margin-top: 10px;">
    <!-- Header -->
      <div class="panel panel-default">
        <div class="panel-body">
        <!-- Logo and company name -->
            <?php 
                require('header.php');
                echo head();
            ?>
        <!-- Navigation -->
            <?php 
                require('menu.php');
                echo menu();
            ?>
    <!-- Header -->

    <!-- Content -->
        <div>
        <h2>Sending test messages to MQTT</h2>
            <p>This page sends a single MQTT message to the topic <b>webshop/test</b>.</p>
            <!-- Add error handling -->
            <?php
                define('BROKER', 'localhost');
                define('PORT', 1883);
                define('CLIENT_ID', "webshop_" + getmypid());
                $topic = "webshop";
                $subtopic = "test";
                $completeTopic = $topic."/".$subtopic;
                 
                $client = new Mosquitto\Client(CLIENT_ID);
                $client->connect(BROKER, PORT, 60);

                $message = "Test message from webshop at ".date("Y-m-d H:i:s");
                $client->publish($completeTopic, $message, 0, false);

                echo "<h3><span class='label label-success'>The message '".$message." ' was sent to '".$completeTopic." '.</span></h3>\n";
            ?>
            <p>To see the messages, subscribe to the topic <b>webshop/#</b>.</p>
            <code>mosquitto_sub -h localhost -t webshop/#</code>
        </div>
      </div>
    </div>
    <!-- Content -->
    <!-- Footer -->
    <?php 
        require('footer.php');
        echo foot();
    ?>
    <!-- Footer -->
  </body>
</html>
