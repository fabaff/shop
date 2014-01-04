.. 

Data export
===========

PDF
---
`FPDF`_ is a PHP class that allows to generate PDF files with pure PHP. As 
a showcase for that the product specifications for a given product are filled
in a pdf and showed in the browser. The user can then decide to download or
print the file. 

.. _FPDF: http://www.fpdf.org/

JSON
----
JavaScript Object Notation (`JSON`_) is a lightweight data-interchange format.
The format is language independent and PHP support the encoding and the 
decoding JSON with ``json_encode($data)`` and ``json_decode($data)``. ::

    ...
    $rows = array();
    $sql = "SELECT * FROM products";
    $results = $connection->query($sql);
    while ($result = $results->fetch_object()) {
        $rows[] = $result;
    }
    $results->close();

    // Writing all rows to a JSON file
    $fp = fopen('pencils.json', 'w');
    fwrite($fp, json_encode($rows));
    fclose($fp);
    ?>

and for reading it::

    <?php 
        $json = file_get_contents('pencils.json');
        print_r(json_decode($json));
    ?>

.. _JSON: http://www.json.org
