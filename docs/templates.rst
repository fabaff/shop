.. 

Templates
=========
Beside other solutions `Savant3`_ is a lightweight object-oriented template
system for PHP. This solution does not need a lot of additional configuration.

.. _Savant3: http://phpsavant.com/ 

Template
--------
A simple template file looks like the one shown below. ::

    <html>
        <head>
            <title><?php echo $this->eprint($this->title); ?></title>
        </head>
        <body>
            <?php echo $this->eprint($this->content); ?>         
        </body>
    </html>

For a more detailed intro, check this `article`_ on `Zend Developer Zone`_. 

.. _article: http://devzone.zend.com/1542/creating-modular-template-based-interfaces-with-savant/
.. _Zend Developer Zone: http://devzone.zend.com

Content
-------
To fill the template with data, all wished variables needs to be defined in 
a seperate PHP file. ::

    <?php
        require_once 'scripts/Savant3.php';
        $tpl = new Savant3();

        // Create a title
        $title = "Simple sample page";

        // Create the content of the page
        $content = "Some sample text to show";

        // Assign values to the Savant instance
        $tpl->title = $title;
        $tpl->content = $content;

        // Define the template source file to show
        $tpl->display('simple.tpl.php');
    ?>

The webshop contains a page (master) 
