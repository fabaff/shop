<?php
    /* Only root@localhost is a valid recipient. The postfix configuration is
     * not checked yet and perhaps will never be. No mails are sent to the
     * outside world.
     * For testing:
     * mail('root@localhost', 'Test Message', 'Test message body.');
    */

	/**
	 * Send a message over the local SMTP server to a recipient.
     * 
	 * @param String $to
	 * @param String $subtopic
	 * @param String $message
	 */
    function sendMail($to, $subj, $message) {
        $to = "root@localhost";
        $subj = "Pencil webshop order";
        $message = "Hi Customer,\nYour order will be shipped soon!\nPencil Webshop";
        $from = "From:webshop@pencil.webshop";

        mail($to, $subj, $message, $from."\r\n");
    }
?>
