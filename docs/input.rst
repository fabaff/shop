.. 

Input processing
================

"Buy Now" links
---------------
The "Buy Now" links are attached to the ``products`` page. Every entry has
it's own link which lead to a detail page. The links are using hidden form
elements to transfer the data.

    <?php
        $products = array(array('Bleistift', 'keine', 'rot', 'HB', '1'),
                          array('Bleistift', 'keine', 'rot', 'B', '1'),
                          array('Bleistift', 'keine', 'rot', '2B', '1',),
                          array('Bleistift', 'keine', 'gelb', 'F', '1.2'),
                          array('Bleistift', 'keine', 'gelb', 'H', '1.2'),
                          array('Bleistift', 'keine', 'gelb', '2H', '1.2')
                    );
        foreach ($products as $product => $details) {
            echo "<tr>"."\n";
            foreach ($details as $detail) {
                echo "<td>".$detail."</td>"."\n";
            }
            echo "<td>"."\n";
            echo "<form action='product.php' method='get' name='pencil'>"."\n";
            echo "<input type='hidden' name='type' value='$details[0]'/>"."\n";
            echo "<input type='hidden' name='options' value='$details[1]'/>"."\n";
            echo "<input type='hidden' name='color' value='$details[2]'/>"."\n";
            echo "<input type='hidden' name='hardness' value='$details[3]'/>"."\n";
            echo "<input type='hidden' name='price' value='$details[4]'/>"."\n";
            echo "<input type='submit' class='btn btn-default' value='Kauf mich'/>"."\n";
            echo "</form>"."\n";
            echo "</td>"."\n";
            echo "</tr>"."\n";
        }
    ?>

And the detail page contains the code fragement mentioned below. ::

    <?php
        $type=$_GET['type'];
        $color=$_GET['color'];
        $hardness=$_GET['hardness'];
        $options=$_GET['options'];
        $price=$_GET['price'];
        echo "Ich bin ein $type, in $color und mit der Härte $hardness. Ich habe $options Optionen und koste $price CHF.";
    ?>


Select options
--------------


Form validation
---------------



Shipping address
----------------


Confirmation
------------

