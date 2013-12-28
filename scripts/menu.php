<?php    
    function menu() {
        $part1 = '<ul class="nav nav-tabs">'."\n";
        $part2 = '';
        $part3 = '</ul>'."\n";
        // Menu array with page title and assigned file
        $menu = array('Home' => 'index.php',
                      'Products' => 'products.php', 
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
        return $part1.$part2.$part3;
    }
?>
