<?php
    require_once('scripts/helpers.php');
	/**
	 * Send a message to a MQTT broker.
     * 
	 * @param String $subtopic
	 * @param String $message
	 */
    function sendMsg($subtopic, $message) {
        define('BROKER', 'localhost');
        define('PORT', 1883);
        define('CLIENT_ID', "webshop_" + getmypid());

        $topic = "webshop";
        $completeTopic = $topic."/".$subtopic;

        try {
            $client = new Mosquitto\Client(CLIENT_ID);
            $client->connect(BROKER, PORT, 60);
            $client->publish($completeTopic, $message, 0, false);
        }
        catch (Mosquitto\Exception $e) {
            echo "The mosquitto broker is not running.";
            die;
        }
    }
	/**
	 * Send a default message to a MQTT broker.
     * 
	 * @param String $subtopic
	 * @param String $page
	 */
    function defaultMsg($subtopic, $page) {
        $date = getDateDMY();
        $time = getTimeHMS();
        $completeMessage = "Somebody visit the '".$page."' page at ".$date." on ".$time;
        sendMsg($subtopic, $completeMessage);
    }
	/**
	 * Send a custom message to a MQTT broker.
     * 
	 * @param String $subtopic
	 * @param String $message
	 */
    function customMsg($subtopic, $message) {
        $date = getDateDMY();
        $time = getTimeHMS();
        $completeMessage = $message." : ".$date." on ".$time;
        sendMsg($subtopic, $completeMessage);
    }
?>
