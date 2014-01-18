<?php
    //require_once('config/dbconnect.php');
    // Set the default timezone, otherwise the system runs with UTC.
    date_default_timezone_set("Europe/Vaduz");
    /**
     * Get the name of the full name of the page.
     *
     * @return string The page name
     */
    function getFullPage() {
        $this_page = $_SERVER['PHP_SELF'];
        return $this_page;
    }
    /**
     * Get the name of the name of the page.
     *
     * @return string The page name
     */
    function getShortPage() {
        return basename($_SERVER['PHP_SELF'], ".php");
    }
    /**
     * Get the date (e.g. 10.10.2013).
     *
     * @return string The current time
     */
    function getDateDMY() {
        return date('d.m.Y');
    }
    /**
     * Get the date (e. g. 2013-10-10). 
     *
     * @return string The current date
     */
    function getDateYMD() {
        return date('Y-m-d');
    }
    /**
     * Get the year.
     *
     * @return string The current year
     */
    function getDateY() {
        return date('Y');
    }
    /**
     * Get the time.
     *
     * @return string The current time
     */
    function getTimeHMS() {
        return date('H:i:s');
    }
    /**
     * Get the time.
     *
     * @return string The current time
     */
    function getTimeHM() {
        return date('H:i');
    }
    /**
     * Sanitize a given string.
     *
     * @param String $string The string to sanitized
     * @return string The sanitized string
     */
    function sanitizeString($string) {
        $string = strip_tags($string);
        $string = htmlentities($string);
        $string = stripslashes($string);
        return mysql_real_escape_string($string);
    }
    /**
     * Get the browser language and set it as session variable.
     */
    function getLanguage() {
        $l10n = array('de_CH', 'fr_FR', 'en_US');
        $language = explode(',' , $_SERVER['HTTP_ACCEPT_LANGUAGE']);
        foreach ($l10n as $lang) {
            if (substr($language[0], 0, 2) == substr($lang, 0, 2)) {
                if (!isset($_SESSION["SESSION_LANG"])) {
                $_SESSION["SESSION_LANG"] = $lang;
                }
            }
        }
        return $lang;
    }
    /**
     * Set the language for the website.
     */
    function setLanguage() {
            // TODO: Move to languages array to a place where it's managable
            //echo "<div class=\"panel panel-default\" style=\"float: right; width: 100px; margin: 5px; padding: 5px;\">"."\n";
            $languages = array('de_CH', 'fr_FR', 'en_US');
            foreach ($languages as $lang) {
                echo "<a href=\"javascript:document.".$lang.".submit(); \">".substr($lang, 0, 2)."</a> "."\n";
            }
            // Create hidden form for language selection
            foreach ($languages as $lang) {
                echo "<form action=".$_SERVER['PHP_SELF']." method=\"POST\" name=\"$lang\">"."\n";
                echo "<input type=\"hidden\" name=\"lang\" value=\"$lang\"/>"."\n";
                echo "</form>"."\n";
            }
            //echo "</div>";
            if (isset($_POST['lang'])) {
                $locale = $_POST['lang'];
            } else {
                $locale = 'en_US';
            }
            $_SESSION["SESSION_LANG"] = $locale;
            putenv('LANG='.$locale);
            setlocale(LC_ALL, $locale);
            $domain = 'webshop';
            bindtextdomain($domain, 'locale');
            bind_textdomain_codeset($domain, 'UTF-8');
            textdomain($domain);

        /* Maybe the one-time switch fits your needs
        if (isset($_POST['lang'])) {
            $locale = $_POST['lang'];
            $_SESSION["SESSION_LANG"] = $locale;
            putenv('LANG='.$locale);
            setlocale(LC_ALL, $locale);
            $domain = 'webshop';
            bindtextdomain($domain, 'locale');
            bind_textdomain_codeset($domain, 'UTF-8');
            textdomain($domain);
        } else {
            // All available languages
            $languages = array('de_CH', 'fr_FR', 'en_US');
            foreach ($languages as $lang) {
                echo "<a href=\"javascript:document.".$lang.".submit(); \">".substr($lang, 0, 2)."</a> "."\n";
            }
            // Create hidden form for language selection
            foreach ($languages as $lang) {
                echo "<form action=".$_SERVER['PHP_SELF']." method=\"POST\" name=\"$lang\">"."\n";
                echo "<input type=\"hidden\" name=\"lang\" value=\"$lang\"/>"."\n";
                echo "</form>"."\n";
            }
        }*/
    }
    /**
     * Get the right image for the given color.
     *
     * @param string $color The color of the image
     * @return string The complete HTML tag for the image
     */
    function getImage($color) {
        switch($color) {
            case "black":
                return "<p><img src=\"images/black.png\" alt=\"Product name\" class=\"img-rounded\"></img></p>";
                break;
            case "blue":
                return "<p><img src=\"images/blue.png\" alt=\"Product name\" class=\"img-rounded\"></img></p>";
                break;
            case "red":
                return "<p><img src=\"images/red.png\" alt=\"Product name\" class=\"img-rounded\"></img></p>";
                break;
            case "white":
                return "<p><img src=\"images/white.png\" alt=\"Product name\" class=\"img-rounded\"></img></p>";
                break;
            default:
                return "<p><img src=\"images/default.png\" alt=\"Product name\" class=\"img-rounded\"></img></p>";
                break;
        }
    }

    /**
     * Get the control menu for the AJAX part of the product overview.
     *
     * @return string The complete HTML tag for the image
     */
    function colorControl() {
        // TODO: Fix this with the include. Doesn't seems to work the usual way...
        $connection = new mysqli('localhost', 'root', 'webshop', 'webshop');
        if ($connection->connect_errno == 0) {
            $sql = "SELECT * FROM colors";
            $results = $connection->query($sql);
            echo "<table><tr>";
            echo "<td><small>Select color filter: &nbsp;</small></td>";
            while ($result = $results->fetch_object()) {
                echo "<td>"."\n";
                echo "<a class=\"btn btn-xs btn-default\" href=\"#\" onclick=\"showPencils($result->id)\" role=\"button\">$result->type</a>"."\n";
                echo "</td>"."\n";
            }
            echo "<td>"."&nbsp;&nbsp;<a class=\"btn btn-xs btn-default\" href=\"#\" onclick=\"location.reload();\" role=\"button\">Reset</a>"."</td>"."\n";
            $results->close();
            echo "</tr></table>";
        } else {
            echo "Database connection error";
        }
    }

?>
