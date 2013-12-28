<?php
    require_once("helpers.php");
    require_once("config/variables.php");

    /**
     * Get the year.
     *
     * @return date
     */
    function startp($page_title) {
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
        echo "</head>"."\n";
        echo "<body>"."\n";
    }

    function head() {
        global $company;
        global $start_page;

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

    function foot() {
        global $company;

        echo "</div>"."\n"."</div>"."\n"."</div>"."\n";
        echo "<div class=\"footer\">"."\n";
        echo "\t<p>&copy; ".$company." ".getDateY()."</p>"."\n";
        echo "</div>"."\n";
    }

    function endp() {
        echo "</body>"."\n"."</html>";
    }

    function menu() {
        $part1 = '<ul class="nav nav-tabs">'."\n";
        $part2 = '';
        $part3 = '</ul>'."\n";
        // Menu array with page title and assigned file
        $menu = array('Home' => 'index.php',
                      'Products' => 'overview-products.php', 
                      'About' => 'about.php'
            );
        foreach ($menu as $label => $link) {
            // For the CSS, only the file name without / is needed
            $url = trim($_SERVER['PHP_SELF'], '/');
            if ($link == $url) {
                $part2 = $part2."<li class='active'><a href='".$link."'>".$label."</a></li>\n";
            } else {
                $part2 = $part2."<li class=''><a href='".$link."'>".$label."</a></li>\n";
            }
        }
        echo $part1.$part2.$part3;
    }
?>
