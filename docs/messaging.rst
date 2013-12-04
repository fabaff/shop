.. 

Messaging
=========
Beside standard email messages the webshop supports sending MQ Telemetry
Transport protocol (`MQTT`_) messages as an additional feature. The MQTT
messages are small  

.. _MQTT: http://mqtt.org

MQTT
----
`Mosquitto-PHP`_ is used as a PHP wrapper for MQTT. Please check the Project's
`README` for details about the installation and the setup.

.. _Mosquitto-PHP: https://github.com/mgdm/Mosquitto-PHP
.. _README: https://github.com/mgdm/Mosquitto-PHP/blob/master/README.md

Broker
``````
`Mosquitto`_ is a message broker that implements the MQ Telemetry Transport
protocol. Check if ``mosquitto`` is running::

    $ sudo systemctl status mosquitto.service

If not, start it ::
    
    $ systemctl start mosquitto.service

All messages are published to the topic ``webshop``.

.. _Mosquitto: http://mosquitto.org/

Publishing
``````````
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
```````````
To read the messages sent by the webshop, a client is needed. The `Mosquitto`_
broker contain a simple command-line tool for subscribing to various topics. ::

    $ mosquitto_sub -h localhost -t webshop/#

Email
-----
This section doesn't describe the installation and configuration of a local 
MTA. There are enough resources that contains information about the setup of
postfix for local delivery only. 

If you want to test the email feature, add the following code in one of PHP 
pages. ::

    <?php mail('root@localhost', 'Test message from webshop', 'The webshop is selling pencils.'); ?>

By default `SELinux`_ is running in ``Enforcing`` mode which is restrictive
about about what a web server can do. To allow sending email the following
SELinux boolean needs to changed ::

    # setsebool -P httpd_can_network_connect=1
    # setsebool -P httpd_can_sendmail=1

.. _SELinux: http://selinuxproject.org/page/Main_Page
