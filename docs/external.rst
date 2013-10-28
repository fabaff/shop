.. 

External files
==============

Navigation Menu
---------------
The menu is outsourced in the file ``menu.php``. ::

    <?php    
        function menu() {
            $part1 = '<ul class="nav nav-tabs">'."\n";
            $part2 = '';
            $part3 = '</ul>'."\n";
            // Menu array with page title and assigned file
            $menu = array('Home' => 'index.php',
                          'Produkte' => 'products.php', 
                          'Über uns' => 'about.php'
                );
            foreach ($menu as $label => $link) {
                // For the CSS only the file name without / is needed
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

Header
------
The complete header part is loaded from the file ``header.php``. ::

    <?php
        function head() {
            $start_page = "index.php";
            $part1 = "<div>\n";
            $part2 = "\t<a class='brand-logo' href='".$start_page."'></a>\n";
            $part3 = "\t<p class='brand-name'>Webshop Pencil AG</p>\n";
            $part4 = "</div>\n";
            return $part1.$part2.$part3.$part4;
        }
    ?>


Footer
------
The same is done witht the page footers. ::

    <?php
        function foot() {
            $class1 = '<div class="footer">'."\n";
            $class2 = '</div>'."\n";
            $text = "<p>&copy; Pencil AG ".getYear().'</p>'."\n";
            return $class1.$text.$class2;
        }

        function getYear(){
            return date("Y");
        }
    ?>

