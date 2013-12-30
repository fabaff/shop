.. 

Database
========

The database backend for the webshop will be `MySQL`_ or the drop-in replacement 
`MariaDB`_.

.. _MySQL: http://www.mysql.com/
.. _MariaDB: https://mariadb.org/

For the setup please check the `development` section in this documentation.

Tables
------
The following tables are needed for the webshop to work.

Products
''''''''
This SQL snipplet is for the products table::

    CREATE TABLE IF NOT EXISTS `products` (
        `id` INT(11) NOT NULL AUTO_INCREMENT,
        PRIMARY KEY (`id`),
        `name` VARCHAR(30) NOT NULL,
        `type` VARCHAR(30) NOT NULL,
        CONSTRAINT type FOREIGN KEY (id) REFERENCES pencils(id),
        `option` VARCHAR(30),
        CONSTRAINT option FOREIGN KEY (id) REFERENCES options(id),
        `color` VARCHAR(10) NOT NULL,
        CONSTRAINT color FOREIGN KEY (id) REFERENCES colors(id),
        `hardness` VARCHAR(2) NOT NULL,
        CONSTRAINT hardness FOREIGN KEY (id) REFERENCES hardness(id),
        `price` VARCHAR(3) NOT NULL,
        `adate` DATE NOT NULL
    );


Customers
'''''''''
This SQL snipplet is for the customers table::

    CREATE TABLE IF NOT EXISTS `customers` (
        `id` INT(11) NOT NULL AUTO_INCREMENT,
        PRIMARY KEY (`id`),
        `username` VARCHAR(30) NOT NULL,
        UNIQUE (`username`),
        `lastname` VARCHAR(30) NOT NULL,
        `firstname` VARCHAR(30) NOT NULL,
        `email` VARCHAR(50) NOT NULL,
        `password` VARCHAR(60) NOT NULL,
        `birthdate` text NOT NULL,
        `gender` VARCHAR(20) NOT NULL
    );

Helper tables
'''''''''''''
Some addiditional tables are needed to store data for the `products` table::

    CREATE TABLE IF NOT EXISTS `pencils` (
        `id` INT(11) NOT NULL AUTO_INCREMENT,
        PRIMARY KEY (`id`),
        `type` VARCHAR(30) NOT NULL
    );

If you like to have some data in it::

    INSERT INTO `pencils` VALUES (NULL, 'Pencil');
    INSERT INTO `pencils` VALUES (NULL, 'Mechanical pencil');
    INSERT INTO `pencils` VALUES (NULL, 'Spezial pencil');

This SQL snipplet is for the colors table::

    CREATE TABLE IF NOT EXISTS `colors` (
        `id` INT(11) NOT NULL AUTO_INCREMENT,
        PRIMARY KEY (`id`),
        `type` VARCHAR(10) NOT NULL
    );

If you like to have some initial data in it::

    INSERT INTO `colors` VALUES (NULL, 'blue');
    INSERT INTO `colors` VALUES (NULL, 'black');

This SQL snipplet is for the hardness table::

    CREATE TABLE IF NOT EXISTS `hardness` (
        `id` INT(11) NOT NULL AUTO_INCREMENT,
        PRIMARY KEY (`id`),
        `type` VARCHAR(2) NOT NULL
    );

If you like to have some initial data in it::

    INSERT INTO `hardness` VALUES (NULL, 'HB');

This SQL snipplet is for the hardness table::

    CREATE TABLE IF NOT EXISTS `options` (
        `id` INT(11) NOT NULL AUTO_INCREMENT,
        PRIMARY KEY (`id`),
        `type` VARCHAR(30) NOT NULL
    );

If you like to have some initial data in it::

    INSERT INTO `options` VALUES (NULL, 'Rubber');
    INSERT INTO `options` VALUES (NULL, 'Handle');

Users
'''''
The SQL snipplet for the users table::

    CREATE TABLE `users` (
        `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `username` VARCHAR(30) NOT NULL,
        `password` CHAR(128) NOT NULL,
        `email` VARCHAR(50) NOT NULL,
        `salt` CHAR(128) NOT NULL
    );
