<?php
    require('scripts/page-elements.php');
	// Allow access only if the user is logged in, ohterwise the user will be
    // send back to the login page
	if ($_SESSION["SESSION_ADMIN"] != "YES") {
	    header("Location: login.php");
	}
?>
<?php getStart('Add product'); ?>
<!-- Place javascript here ---------------------------------------------------->

<!----------------------------------------------------------------------------->
<?php getHeader(); ?> <?php getMenu(); ?>
<!-- Content (can be HTML or PHP code fragements) ----------------------------->
<h3>Add product</h3>
<form name="add" action="scripts/add-product-process.php" method="post">
<table width="510" border="0">
<tr>
    <td colspan="2"></td>
</tr>
<tr>
    <td>Product name:</td>
    <td><input class="form-control" type="text" name="pname" maxlength="20" /></td>
</tr>
<tr>
    <td>Product description:</td>
    <td><textarea class="form-control" type="text" name="pdesc"></textarea></td>
</tr>
<tr>
    <td>Type:</td>
    <td><select class="form-control input-sm" name="ptype">
        <option></option>
        <!-- Move this to a function in helpers.php-->
            <?php
                require_once('config/dbconnect.php');
                $table = "pencils";
                $sql = "SELECT * FROM $table";
                $results = $connection->query($sql);
                while ($result = $results->fetch_object()) {
                    echo '<option value='.$result->id.'>'.$result->type.'</option>';
                }
            ?>
    </select></td>
</tr>
<tr>
    <td>Option:</td>
    <td><select class="form-control input-sm" name="poption">
        <option></option>
            <?php
                require_once('config/dbconnect.php');
                $table = "options";
                $sql = "SELECT * FROM $table";
                $results = $connection->query($sql);
                while ($result = $results->fetch_object()) {
                    echo '<option value='.$result->id.'>'.$result->type.'</option>';
                }
            ?>
    </select></td>
</tr>
<tr>
<td>Color:</td>
<td><select class="form-control input-sm" name="color">
    <option></option>
        <?php
            require_once('config/dbconnect.php');
            $table = "colors";
            $sql = "SELECT * FROM $table";
            $results = $connection->query($sql);
            while ($result = $results->fetch_object()) {
                echo '<option value='.$result->id.'>'.$result->type.'</option>';
            }
        ?>
</select></td>
</tr>
<tr>
    <td>Hardness:</td>
    <td><select class="form-control input-sm" name="hardness">
        <option></option>
            <?php
                require_once('config/dbconnect.php');
                $table = "hardness";
                $sql = "SELECT * FROM $table";
                $results = $connection->query($sql);
                while ($result = $results->fetch_object()) {
                    echo '<option value='.$result->id.'>'.$result->type.'</option>';
                }
            ?>
</select></td>
</tr>
<tr>
    <td>Price (CHF):</td>
    <td><input class="form-control" type="text" name="price" maxlength="10" /></td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td><button class="btn btn-xs btn-default" type="submit" value="Add">Add entry</button></td>
</tr>
</table>
</form>
<!----------------------------------------------------------------------------->
<!-- Footer and end-of-file -->
<?php getFooter(); ?> 
<!-- Place javascript here ---------------------------------------------------->

<!----------------------------------------------------------------------------->
<?php getEnd(); ?>
