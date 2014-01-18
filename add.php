<?php
    require('scripts/page-elements.php');
	// Allow access only if the user is logged in, ohterwise the user will be
    // send back to the login page
	if ($_SESSION["SESSION_ADMIN"] != "YES") {
	    header("Location: login.php");
	}
?>
<?php getStart('Add entry'); ?>
<!-- Place javascript here ---------------------------------------------------->

<!----------------------------------------------------------------------------->
<?php getHeader(); ?> <?php getMenu(); ?>
<!-- Content (can be HTML or PHP code fragements) ----------------------------->
<?php
    $table = $_GET["table"];
    echo "<h3>Add entry to table '".$table."'</h3>"."\n";
    // Create SQl statement
    $sql = "SELECT * FROM $table";
    // Get entries from table
    $results = $connection->query($sql);
    // Count rows
    echo $results->num_rows." entries in ".$table." found."."<br />"."\n";
    // Displays rows
    echo "<ul>"."\n";
    while ($result = $results->fetch_object()) {
        echo "<li>".$result->type."</li>";
    }
    echo "</ul>"."\n";
    $connection->close();

    $form = "
    <form name=\"add\" action=\"scripts/add-process.php\" method=\"post\">
    <table width=\"510\" border=\"0\">
    <tr>
        <td colspan=\"2\"></td>
    </tr>
    <tr>
        <td>Entry:</td>
        <td><input class=\"form-control\" type=\"text\" name=\"entry\" maxlength=\"20\" /></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><button class=\"btn btn-default\" type=\"submit\" value=\"Add\">Add entry</button></td>
    </tr>
    </table>
        <input type=\"hidden\" name=\"table\" value=\"$table\"/>
    </form>";
    echo $form."\n";
?>
<!----------------------------------------------------------------------------->
<!-- Footer and end-of-file -->
<?php getFooter(); ?> 
<!-- Place javascript here ---------------------------------------------------->

<!----------------------------------------------------------------------------->
<?php getEnd(); ?>
