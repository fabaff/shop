<?php
    require('scripts/page-elements.php');
	// Allow access only if the user is logged in, ohterwise the user will be
    // send back to the login page
	if ($_SESSION["SESSION_ADMIN"] != "YES") {
	    header("Location: login.php");
	}
?>
<?php getStart('Edit entry'); ?>
<!-- Place javascript here ---------------------------------------------------->

<!----------------------------------------------------------------------------->
<?php getHeader(); ?> <?php getMenu(); ?>
<!-- Content (can be HTML or PHP code fragements) ----------------------------->
<?php               
    $table = $_POST["table"];
    $entry = $_POST["id"];

    // Create SQl statement
    $sql = "SELECT * FROM $table WHERE id='$entry'";
    // Get entries from table
    $results = $connection->query($sql);
    $id = 0;
    $type = "";
    // Get row entry
    while ($result = $results->fetch_object()) {
        $id = $result->id;
        $type = $result->type;
    }
    echo "<h3>Edit entry (".$type.", ID ".$entry.") in table '".$table."'</h3>"."\n";
    $connection->close();
    
    $form = "
    <form name=\"add\" action=\"scripts/edit-process.php\" method=\"POST\">
    <table width=\"510\" border=\"0\">
    <tr>
        <td colspan=\"2\"></td>
    </tr>
    <tr>
        <td>Content:</td>
        <td><input class=\"form-control\" type=\"text\" name=\"entry\" value=\"$type\" maxlength=\"20\" /></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><button class=\"btn btn-default\" type=\"submit\" value=\"Update\">Update entry</button></td>
    </tr>
    </table>
        <input type=\"hidden\" name=\"table\" value=\"$table\"/>
        <input type=\"hidden\" name=\"id\" value=\"$id\"/>
    </form>";
    echo $form."\n";
?>
<!----------------------------------------------------------------------------->
<!-- Footer and end-of-file -->
<?php getFooter(); ?> 
<!-- Place javascript here ---------------------------------------------------->

<!----------------------------------------------------------------------------->
<?php getEnd(); ?>
