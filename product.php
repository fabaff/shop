<?php
    require('scripts/page-elements.php');
?>
<?php getStart('Product details'); ?>
<!-- Place javascript here ---------------------------------------------------->

<!----------------------------------------------------------------------------->
<?php getHeader(); ?> <?php getMenu(); ?>
<!-- Content (can be HTML or PHP code fragements) ----------------------------->
<!-- Old stuff 
<?php
    $type=$_GET['type'];
    $color=$_GET['color'];
    $hardness=$_GET['hardness'];
    $options=$_GET['options'];
    $price=$_GET['price'];
    echo "Ich bin ein $type, in $color und mit der Härte $hardness. Ich habe $options Optionen und koste $price CHF.";
?>-->
<?php
    // Get the parameter
    $id = $_GET['id'];
    // Create SQL query
    $sql = "SELECT
        products.id AS id,
        products.pname AS name,
        products.pdesc AS description,
        pencils.type AS type,
        options.type AS option,
        colors.type AS color,
        hardness.type AS hardness,
        products.price AS price
        FROM products 
        JOIN pencils ON products.ptype=pencils.id
        JOIN options ON products.poption=options.id
        JOIN colors ON products.color=colors.id
        JOIN hardness ON products.hardness=hardness.id
        WHERE products.id=$id";
    $results = $connection->query($sql);
    $result = $results->fetch_object();
    // Debug
    //print_r($result);
    echo "<h3>".$result->name."</h3>";
    echo getImage($result->color);
    echo "<br/>"."\n";
    echo "<p>".$result->description."</p>";
    echo "<table>"."\n";
    echo "<tr>"."\n";
    echo "<td width=\"150\">"."Type:"."</td>";
    echo "<td>".$result->type."</td>";
    echo "</tr>"."\n";
    echo "<tr>"."\n";
    echo "<td>"."Option:"."</td>";
    echo "<td>".$result->option."</td>";
    echo "</tr>"."\n";
    echo "<tr>"."\n";
    echo "<td>"."Color:"."</td>";
    echo "<td>".$result->color."</td>";
    echo "</tr>"."\n";
    echo "<tr>"."\n";
    echo "<td>"."Hardness:"."</td>";
    echo "<td>".$result->hardness."</td>";
    echo "</tr>"."\n";
    echo "<tr>"."\n";
    echo "<td>"."Price:"."</td>";
    echo "<td>".$result->price." CHF"."</td>";
    echo "</tr>"."\n";
    echo "<tr>"."\n";
    echo "<td>"."<a class=\"btn btn-xs btn-default\" href=\"cart.php?artID=$result->id&qty=1\" role=\"button\">Add to cart</a>"."</td>";
    echo "<td>"."<a class=\"btn btn-xs btn-default\" href=\"scripts/pdf-spec.php?id=$result->id\" role=\"button\">Print product specs</a>"."</td>";
    echo "</tr>"."\n";
    echo "</table>"."\n";
    echo "<br/>"."\n";
    echo "<p><a class=\"btn btn-xs btn-default\" href=\"overview-products.php\" role=\"button\">Back to overview</a></p>";
?>
<!----------------------------------------------------------------------------->
<!-- Footer and end-of-file -->
<?php getFooter(); ?> 
<!-- Place javascript here ---------------------------------------------------->

<!----------------------------------------------------------------------------->
<?php getEnd(); ?>
