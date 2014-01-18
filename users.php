<?php
    require('scripts/page-elements.php');
	// Allow access only if the user is logged in, ohterwise the user will be
    // send back to the login page
	if ($_SESSION["SESSION_ADMIN"] != "YES") {
	    header("Location: login.php");
	}
?>
<?php getStart('Users'); ?>
<!-- Place javascript here ---------------------------------------------------->

<!----------------------------------------------------------------------------->
<?php getHeader(); ?> <?php getMenu(); ?>
<!-- Content (can be HTML or PHP code fragements) ----------------------------->
<h3>Overview users</h3>

<?php
    if ($connection->connect_errno == 0) {
        // Get data
        $sql = "SELECT * FROM users";
        $results = $connection->query($sql);
        $tableinfo = $results->fetch_fields();
        echo $results->num_rows." users entries found."."<br />"."\n";
        // Create table
        echo "<table class=\"table table-striped\">"."\n";
        echo "<thead valign=\"bottom\">"."\n";
        echo "<tr>"."\n";
        foreach ($tableinfo as $element) {
            echo "<th class=\"head\">".ucfirst($element->name)."</th>"."\n";
        }
        echo "</tr>"."\n";
        echo "</thead>"."\n";
        echo "<tbody valign=\"top\">"."\n";
        while ($result = $results->fetch_object()) {
            echo "<tr>"."\n";
            echo "<td>".$result->id."</td>";
            echo "<td>".$result->username."</td>";
            echo "<td>".$result->password."</td>";
            echo "<td>".$result->email."</td>";
            echo "<td>".$result->salt."</td>";
            echo "<td>";
            echo "<form action=\"scripts/edit.php\" method=\"POST\">
                    <input type=\"hidden\" name=\"table\" value=\"users\"/>
                    <input type=\"hidden\" name=\"id\" value=\"$result->id\"/>
                    <input type=\"submit\" name=\"Submit\" class=\"btn btn-xs btn-default\" value=\"Edit\">
                </form>"."\n";
            echo "</td>"."\n";
            echo "</tr>"."\n";
        }
        echo "</tbody>"."\n";
        echo "</table>"."\n";
        $results->close();
    } else {
        echo "Database connection error";
    }
    $connection->close();
?>
<!----------------------------------------------------------------------------->
<!-- Footer and end-of-file -->
<?php getFooter(); ?> 
<!-- Place javascript here ---------------------------------------------------->

<!----------------------------------------------------------------------------->
<?php getEnd(); ?>
