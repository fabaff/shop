<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webshop Pencil AG für Bleistifte">
    <meta name="author" content="Fabian Affolter">
    <title>Webshop Pencil AG | Test messaging system</title>

    <link href="css/webshop.css" rel="stylesheet">
  </head>

  <body>
    <div class="container" style="margin-top: 10px;">
    <!-- Header -->
      <div class="panel panel-default">
        <div class="panel-body">
        <!-- Logo and company name -->
            <?php 
                require('scripts/header.php');
                echo head();
            ?>
        <!-- Navigation -->
            <?php 
                require('scripts/menu.php');
                echo menu();
            ?>
    <!-- Header -->

    <!-- Content -->
        <div>
        <h2>Sending test messages to MQTT</h2>
            <p>This page sends a single MQTT message to the topic <b>webshop/test</b>.</p>
            <!-- Add error and exception handling. Check scripts/send-msg.php for details.-->
            <?php
                define('BROKER', 'localhost');
                define('PORT', 1883);
                define('CLIENT_ID', "webshop_" + getmypid());
                $topic = "webshop";
                $subtopic = "test";
                $completeTopic = $topic."/".$subtopic;
                 
                $client = new Mosquitto\Client(CLIENT_ID);
                $client->connect(BROKER, PORT, 60);

                date_default_timezone_set("Europe/Vaduz");
                $message = "Test message from webshop at ".date("Y-m-d H:i:s");
                $client->publish($completeTopic, $message, 0, false);

                echo "<h3><span class='label label-success'>The message '".$message." ' was sent to '".$completeTopic." '.</span></h3>\n";
            ?>
            <p>To see the messages, subscribe to the topic <b>webshop/#</b>.</p>
            <code>mosquitto_sub -h localhost -t webshop/#</code>
        <h2>Sending a test email</h2>
        <?php
            $filename = $_SERVER["PHP_SELF"];
            $recipient = 'root@localhost';
            $subject = 'Test Message';
            $message = 'Test message body.';
            if (isset($_GET['send-mail'])) {
                if (mail($recipient, $subject, $message)) {
                    echo "Message sent.";
                }
            } else {
            echo "<form action=\"$filename\" method=\"GET\">
                    <input type=\"hidden\" name=\"send-mail\" value=\"send\">
                    <input type=\"submit\" class=\"btn btn-default\" value=\"Send e-mail message\">
                </form>";
            }

            /* or with the external file
             * include('scripts/send-mail.php');
             * sendMail('root@localhost', 'This is a test', 'We are just testing the email feature.');
            */
        ?>
        </div>
      </div>
    </div>
    <!-- Content -->
    <!-- Footer -->
    <?php 
        require('scripts/footer.php');
        echo foot();
    ?>
    <!-- Footer -->
  </body>
</html>
