.. _database:

Database
========

The database backend for the webshop will be `MariaDB`_ which is the drop-in
replacement for `MySQL`_.

.. _MySQL: http://www.mysql.com/
.. _MariaDB: https://mariadb.org/

For the setup please check the :ref:`Development` section in this documentation.

Tables
------
The following tables are needed for the webshop to work.

- products
- customers
- pencils
- colors
- hardness
- options
- users

Please use the ``devel/webshop.sql`` to setup the database.

PHP
---
Below you find the configuration file for a default installation of the webshop.
This file is a template and filled during the setup process. ::
 
    <?php
        $host       = "localhost";
        $user       = "root";
        $password   = "webshop";
        $dbase      = "webshop";
        $connection = new mysqli($host, $user, $password, $dbase);

        if ($connection->connect_errno) {
           echo "Failed to connect to MariaDB/MySQL: (".$connection->connect_errno.") ".$connection->connect_error;
        }
        mysqli_report(MYSQLI_REPORT_ERROR);
    ?>

All connections to the database are done in the same way. Below you find an
example. Everything is done in the object-oriented style. ::

    <?php
        require_once('config/dbconnect.php');
        if ($connection->connect_errno == 0) {
            $sql = "SELECT * FROM products";
            $results = $connection->query($sql);
            echo $results->num_rows;
            $results->close();
        } else {
            echo "Database connection error";
        }
    ?>
