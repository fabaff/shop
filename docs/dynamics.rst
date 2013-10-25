.. 

Dynamics
========

The webshop will be a `PHP`_ application at the end. Those first steps are only
covering the very basic stuff of PHP as an introduction.

.. _PHP: http://ch.php.net/

Setup
-----
The ``setup.yml`` playbook puts a simple PHP file in the root directory of the
web server with the name ``phpinfo.php``. This file displays PHP details.

.. attention::
   Remove this file before makeing the shop accessible by a public audience.

Current year
------------
The first PHP element in the webshop is showing the current year in the footer
of every page. With the help of this little piece of code there is no longer
a need to update the year. ::

    <?php echo date("Y") ?>

Navigation Menu
---------------
The basic menu was built with the following snippet. ::

    <?php
        $menu = array('Home' => 'index.php',
                      'Produkte' => 'products.php',
                      'Über uns' => 'about.php'
                );
        foreach($menu as $label => $link) {
            echo '<li><a href="', $link, '">', $label, '</a></li>';
        }
    ?>

The issue with that snippet was that the CSS class was missing. In regards to
a future separation and reusability an additional statements was added. This
way the label of the active page is highlighted.

    <?php
        $menu = array('Home' => 'index.php',
                      'Produkte' => 'products.php', 
                      'Über uns' => 'about.php'
            );
        foreach ($menu as $label => $link) {
            $url = trim($_SERVER['PHP_SELF'], '/');
            if ($link == $url) {
                echo '<li class="active"><a href="', $link, '">', $label, '</a></li>';
            } else {
                echo '<li class=""><a href="', $link, '">', $label, '</a></li>';    
            }
        }
    ?>

List of Products
----------------

tbd

Comapny details
---------------
The data for the **About** page are included out of a static and plain text
file. ::

    <?php
        $str = file_get_contents("company.txt");
        echo $str;
    ?>
