<?php
    require('scripts/page-elements.php');
	// Allow access only if the user is logged in, ohterwise the user will be
    // send back to the login page
	if ($_SESSION["SESSION_ADMIN"] != "YES") {
	    header("Location: login.php");
	}
?>
<?php getStart('Sessions'); ?>
<!-- Place javascript here ---------------------------------------------------->

<!----------------------------------------------------------------------------->
<?php getHeader(); ?> <?php getMenu(); ?>
<!-- Content (can be HTML or PHP code fragements) ----------------------------->
<h3>Sessions</h3>
<p>The following variables are available in $_SESSION:</p>
<div class="panel panel-default" style="margin: 10px; padding: 10px; border: 1px solid black;">
    <?php 
        if (!empty($_SESSION)) {
            foreach($_SESSION as $key => $value) {
                echo "<p>".$key." : ".$value."</p>";
            }
        } else {
            echo 'There are no session variables available.';
        }
    ?>
</div>
<!----------------------------------------------------------------------------->
<!-- Footer and end-of-file -->
<?php getFooter(); ?> 
<!-- Place javascript here ---------------------------------------------------->

<!----------------------------------------------------------------------------->
<?php getEnd(); ?>
