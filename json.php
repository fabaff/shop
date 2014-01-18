<?php
    require('scripts/page-elements.php');
	// Allow access only if the user is logged in, ohterwise the user will be
    // send back to the login page
	if ($_SESSION["SESSION_ADMIN"] != "YES") {
	    header("Location: login.php");
	}
?>
<?php getStart('JSON'); ?>
<!-- Place javascript here ---------------------------------------------------->

<!----------------------------------------------------------------------------->
<?php getHeader(); ?> <?php getMenu(); ?>
<!-- Content (can be HTML or PHP code fragements) ----------------------------->
<h3>JSON</h3>
<p>The following data were created by the <a href="products.php">Products page</a> in the admin section.</p>
<div class="panel panel-default" style="margin: 10px; padding: 10px; border: 1px solid black;">
    <?php
        if (file_exists('pencils.json')) {
            $json = file_get_contents('pencils.json');
            if (!empty($json)) {
                // Decode the json
                print_r(json_decode($json));
            } else {
                echo "No JSON data available.";
            }
        } else {
            echo "No JSON file avaialble.";
        }
    ?>
</div>
<!----------------------------------------------------------------------------->
<!-- Footer and end-of-file -->
<?php getFooter(); ?> 
<!-- Place javascript here ---------------------------------------------------->

<!----------------------------------------------------------------------------->
<?php getEnd(); ?>
