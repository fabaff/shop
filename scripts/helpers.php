<?php
    /**
     * Get the name of the full name of the page.
     *
     * @return Page name
     */
    function getFullPage() {
        $this_page = $_SERVER['PHP_SELF'];
        return $this_page;
    }
    /**
     * Get the name of the name of the page.
     *
     * @return Page name
     */
    function getShortPage() {
        return basename($_SERVER['PHP_SELF'], ".php");
    }
    /**
     * Get the date (e.g. 10.10.2013).
     *
     * @return date
     */
    function getDateDMY() {
        return date('d.m.Y');
    }
    /**
     * Get the date (e. g. 2013-10-10). 
     *
     * @return date
     */
    function getDateYMD() {
        return date('Y-m-d');
    }
    /**
     * Get the year.
     *
     * @return date
     */
    function getDateY() {
        return date('Y');
    }
    /**
     * Get the time.
     *
     * @return time
     */
    function getTimeHMS() {
        return date('H:i:s');
    }
    /**
     * Get the time.
     *
     * @return time
     */
    function getTimeHM() {
        return date('H:i');
    }
?>
