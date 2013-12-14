.. 

Messaging
=========
The webshop supports sending MQ Telemetry Transport protocol (`MQTT`_) messages.
On the PHP side `Mosquitto-PHP`_ is used as a wrapper.

.. _MQTT: http://mqtt.org
.. _Mosquitto-PHP: https://github.com/mgdm/Mosquitto-PHP

Broker
------
`Mosquitto`_ is a message broker that implements the MQ Telemetry Transport
protocol. ::

    $ sudo systemctl status mosquitto.service

All messages are published to the topic ``webshop``.

.. _Mosquitto: http://mosquitto.org/

Publishing
----------
After the installation of `Mosquitto-PHP`_ the snipplet shown below sends
a single message. ::

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
    ?>

Subscribing
-----------
To read the messages sent by the webshop, a client is needed. The `Mosquitto`_
broker contain a simple command-line tool for subscribing to various topics. ::

    $ mosquitto_sub -h localhost -t webshop/#
