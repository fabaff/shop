<?php
    function menu() {
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
