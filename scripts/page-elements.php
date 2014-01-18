<?php
    require_once('config/dbconnect.php');
    require_once("helpers.php");
    require_once("config/variables.php");

	session_start();

    /**
     * Start section of the page.
     */
    function getStart($page_title) {
        global $company;
        global $author;
        global $description;
        global $css_file;

        echo "<!DOCTYPE html>"."\n";
        echo "<html lang=\"en\">"."\n";
        echo "<head>"."\n";
        echo "\t<meta charset=\"utf-8\">"."\n";
        echo "\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">"."\n";
        echo "\t<meta name=\"description\" content=\"$description\">"."\n";
        echo "\t<meta name=\"author\" content=\"$author\">"."\n";
        echo "\t<title>Webshop ".$company." | ".$page_title."</title>"."\n";
        echo "\t<link href=\"$css_file\" rel=\"stylesheet\">"."\n";
    }

    /**
     * Header section of the page.
     */
    function getHeader() {
        global $company;
        global $start_page;
        echo "</head>"."\n";
        echo "<body>"."\n";
        echo "<div class=\"container\" style=\"margin-top: 10px;\">"."\n";
        echo "<!-- Header -->"."\n";
        echo "\t<div class=\"panel panel-default\">"."\n";
        echo "\t<div class=\"panel-body\">"."\n";
        echo "<!-- Logo and company name -->"."\n";
        echo "<div>\n";
        echo "\t<a class='brand-logo' href='".$start_page."'></a>\n";
        echo "\t<p class='brand-name'>Webshop ".$company."</p>\n";
        echo "</div>\n";
    }

    /**
     * Footer section of the page.
     */
    function getFooter() {
        global $company;

        echo "</div>"."\n"."</div>"."\n"."</div>"."\n";
        echo "<div class=\"footer\">"."\n";
        echo "\t<p>&copy; ".$company." ".getDateY()."</p>"."\n";
        echo "</div>"."\n";
    }

    /**
     * End section of the page.
     */
    function getEnd() {
        echo "</body>"."\n"."</html>";
    }

    /**
     * Menu for the page.
     */
    function getMenu() {
        // Menu for logged-in users admin area
        if (!empty($_SESSION["SESSION_ADMIN"]) || !empty($_SESSION["SESSION_LOGIN"])) {
	        if ($_SESSION["SESSION_ADMIN"] == "YES") {
                $menu = array('Home' => 'index.php',
                              'Products' => 'overview-products.php', 
                              'About' => 'about.php',
                              'Admin' => 'admin.php',
                              'Logout' => 'logout.php'
                    );
                echo entries($menu);

            // Menu for logged-in customers (just a precaution, not implemented)
	        } elseif ($_SESSION["SESSION_LOGIN"] == "YES") {
                $menu = array('Home' => 'index.php',
                              'Products' => 'overview-products.php', 
                              'About' => 'about.php',
                              'Orders' => 'order.php',
                              'Logout' => 'logout.php'
                    );
                echo entries($menu);
        }
        // Standard menu
        } else {
            $menu = array('Home' => 'index.php',
                          'Products' => 'overview-products.php', 
                          'About' => 'about.php',
                          'Login' => 'login.php'
                );
            echo entries($menu);
        }
    }
	/**
	 * Send a message to a MQTT broker.
     * 
	 * @param String $subtopic Array of menu
	 * @return String The html string 
	 */
    function entries($array) {
        $part1 = '<ul class="nav nav-tabs">'."\n";
        $part2 = '';
        $part3 = '</ul>'."\n";
        foreach ($array as $label => $link) {
            // For the CSS, only the file name without / is needed
            $url = trim($_SERVER['PHP_SELF'], '/');
            if ($link == $url) {
                $part2 = $part2."<li class='active'><a href='".$link."'>".$label."</a></li>\n";
            } else {
                $part2 = $part2."<li class=''><a href='".$link."'>".$label."</a></li>\n";
            }
        }
        return $part1.$part2.$part3;
    }
?>
