<?php
    require('scripts/page-elements.php');
	// Allow access only if the user is logged in, ohterwise the user will be
    // send back to the login page
	if ($_SESSION["SESSION_ADMIN"] != "YES") {
	    header("Location: login.php");
	}
?>
<?php getStart('Tables overview'); ?>
<!-- Place javascript here ---------------------------------------------------->

<!----------------------------------------------------------------------------->
<?php getHeader(); ?> <?php getMenu(); ?>
<!-- Content (can be HTML or PHP code fragements) ----------------------------->
<h3>Overview Table content</h3>
<!-- This page was more or less a simple test page for the database connection. -->
<!-- Keep in mind: The connection details are only in this page included. 
     the db connection handling is done by including 'dbconnect.php' !
-->
<?php
    $connection = new mysqli("localhost", "root", "webshop", "webshop");
    if ($connection->connect_errno == 0) {
        $sections = array('pencils', 'colors', 'hardness', 'options');
        foreach ($sections as $section) {
            echo "<h4>".ucfirst($section)."</h4>"."\n";
            $sql = "SELECT * FROM $section";
            $results = $connection->query($sql);
            echo $results->num_rows." ".$section." entries found."."<br />"."\n";
            echo "<table>"."\n";
            while ($result = $results->fetch_object()) {
                // The ugly way from a design point of view                            
                //echo "<a href=\"edit.php?table=$section&id=$result->id\">Edit entry</a>";
                //echo "<a href=\"scripts/delete-process.php?table=$section&id=$result->id\">Delete entry</a>";
                echo "<tr>"."\n";
                echo "<td>$result->type</td>"."\n";
                echo "<td><form action=\"edit.php\" method=\"POST\">
                    <input type=\"hidden\" name=\"table\" value=\"$section\"/>
                    <input type=\"hidden\" name=\"id\" value=\"$result->id\"/>
                    <input type=\"submit\" name=\"Submit\" class=\"btn btn-xs btn-default\" value=\"Edit\">
                </form></td>"."\n";
                echo "<td><form action=\"scripts/delete-process.php\" onSubmit=\"return confirm('Are you sure to delete this entry?');\" method=\"POST\">
                    <input type=\"hidden\" name=\"table\" value=\"$section\"/>
                    <input type=\"hidden\" name=\"id\" value=\"$result->id\"/>
                    <input type=\"submit\" name=\"Submit\" class=\"btn btn-xs btn-default\" value=\"Delete\">
                </form></td>"."\n";
                echo "</tr>"."\n";
            }
            echo "</table>"."\n";
            echo "<a href=\"add.php?table=$section\">Add new entry to $section.</a>";
        }
    } else {
        echo "Database connection error";
    }
    $results->close();
    $connection->close();
?>
<!----------------------------------------------------------------------------->
<!-- Footer and end-of-file -->
<?php getFooter(); ?> 
<!-- Place javascript here ---------------------------------------------------->

<!----------------------------------------------------------------------------->
<?php getEnd(); ?>
